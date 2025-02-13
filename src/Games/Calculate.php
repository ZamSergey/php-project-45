<?php

namespace BrainGames\Calculate;

function calculate(string $operation, int $arg1, int $arg2): int
{
    $rigthAnswer = null;
    switch ($operation) {
        case '+':
            $rigthAnswer = $arg1 + $arg2;
            break;
        case '-':
            $rigthAnswer = $arg1 - $arg2;
            break;
        case '*':
            $rigthAnswer = $arg1 * $arg2;
            break;
        default:
            break;
    }

    return $rigthAnswer;
}
