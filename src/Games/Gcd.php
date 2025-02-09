<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $numberOfQuestions = 3;
    $titleQuestion = "Find the greatest common divisor of given numbers.";
    $questions = [];

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $questions[] = generateQuestions();
    }
    print_r($questions);
    startBrainGame($questions, $titleQuestion);
}

function generateQuestions(): array
{
    $MIN = 1;
    $MAX = 100;

    $arg1 = rand($MIN, $MAX);
    $arg2 = rand($MIN, $MAX);

    $devisors1 = findDivisor($arg1);
    $devisors2 = findDivisor($arg2);
    $rigthAnswer = null;
    $question = "$arg1 $arg2";

    foreach ($devisors1 as $key => $item) {
        if (in_array($item, $devisors2, true)) {
            $rigthAnswer = $item;
            break;
        }
    }

    return [$question, $rigthAnswer];
}

function findDivisor(int $number): array
{
    $devisors = [];
    for ($i = $number; $i >= 1; $i--) {
        if ($number % $i === 0) {
            $devisors[] = $i;
        }
    }
    return $devisors;
}
