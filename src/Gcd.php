<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $count = 3;
    $titleQuestion = "Find the greatest common divisor of given numbers.";
    $questions = [];

    for ($i = 0; $i < $count; $i++) {
        $questions[] = generateQuestions();
    }
    print_r($questions);

    startBrainGame($questions, $titleQuestion);
}

function generateQuestions()
{
    $MIN = 0;
    $MAX = 100;

    $arg1 = rand($MIN, $MAX);
    $arg2 = rand($MIN, $MAX);

    $devisors1 = findDivisor($arg1);
    $devisors2 = findDivisor($arg2);
    $rigthAnswer = null;
    $question = "$arg1 $arg2";

    foreach ($devisors1 as $key => $item) {
        if (in_array($item, $devisors2)) {
            $rigthAnswer = $item;
            break;
        }
    }

    return [$question, $rigthAnswer];
}

function findDivisor($number)
{
    $devisors = [];
    for ($i = $number; $i >= 1; $i--) {
        if ($number % $i === 0) {
            $devisors[] = $i;
        }
    }
    return $devisors;
}
