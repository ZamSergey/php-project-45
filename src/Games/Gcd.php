<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\FindDivisor\findDivisor;

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
