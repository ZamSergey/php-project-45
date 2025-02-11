<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startBrainGame(array $questionAnswer, string $titleQuestion): void
{

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($titleQuestion);

    foreach ($questionAnswer as $item) {
        line("Question: %s", $item['question']);
        $userAnswer = prompt('Your answer');
        $answer = $item['answer'];
        $answerStr = is_numeric($userAnswer) ? intval($userAnswer) : $userAnswer;

        if ($answer !== $answerStr) {
            line("'$answerStr' is wrong answer ;(. Correct answer was '$answer'");
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}

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

function getProgression(int $startValue, int $step, int $length): array
{
    $progression = [$startValue];
    for ($i = 1; $i < $length; $i++) {
        $progression[$i] =  $progression[$i - 1] + $step;
    }
    return $progression;
}
