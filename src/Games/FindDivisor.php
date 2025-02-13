<?php

namespace BrainGames\FindDivisor;

function findDivisor(int $arg1, int $arg2): int
{
    $devisors1 = [];
    $devisors2 = [];
    $devisor = 1;

    for ($i = $arg1; $i >= 1; $i--) {
        if ($arg1 % $i === 0) {
            $devisors1[] = $i;
        }
    }

    for ($j = $arg2; $j >= 1; $j--) {
        if ($arg2 % $j === 0) {
            $devisors2[] = $j;
        }
    }

    if (count($devisors2) > count($devisors1)) {
        foreach ($devisors1 as $item) {
            if (in_array($item, $devisors2, true)) {
                $devisor = $item;
                break;
            }
        }
    } else {
        foreach ($devisors2 as $item) {
            if (in_array($item, $devisors1, true)) {
                $devisor = $item;
                break;
            }
        }
    }

    return $devisor;
}
