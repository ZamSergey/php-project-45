<?php

namespace BrainGames\IsPrime;

function isPrime(int $number): bool
{
    $delimiters = [];
    $result = false;
    if ($number === 0 || $number === 1) {
        return $result;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $delimiters[] = $i;
        }
    }
    return count($delimiters) === 0;
}
