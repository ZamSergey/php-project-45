<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\startBrainGame;

const NUMBER_OF_QUESTIONS = 3;
const QUESTION = "Find the greatest common divisor of given numbers.";
const MIN = 1;
const MAX = 100;

function run()
{
    $questions = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $arg1 = rand(MIN, MAX);
        $arg2 = rand(MIN, MAX);

        $rigthAnswer = findDivisor($arg1, $arg2);
        $question = "$arg1 $arg2";
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }
    startBrainGame($questions, QUESTION);
}

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
