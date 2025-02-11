<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\Engine\findDivisor;

function run()
{
    $numberOfQuestions = 3;
    $titleQuestion = "Find the greatest common divisor of given numbers.";
    $questions = [];

    $MIN = 1;
    $MAX = 100;

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $arg1 = rand($MIN, $MAX);
        $arg2 = rand($MIN, $MAX);

        $rigthAnswer = findDivisor($arg1, $arg2);
        $question = "$arg1 $arg2";
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }
    startBrainGame($questions, $titleQuestion);
}
