<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\Engine\calculate;

function run()
{
    $numberOfQuestions = 3;
    $titleQuestion = "What is the result of the expression?";
    $questions = [];

    $MIN = 0;
    $MAX = 10;
    $operationsType = ['+', '-', '*'];

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $arg1 = rand($MIN, $MAX);
        $arg2 = rand($MIN, $MAX);
        $randomOperation = $operationsType[array_rand($operationsType, 1)];
        $question = "$arg1 $randomOperation $arg2";
        $rigthAnswer = calculate($randomOperation, $arg1, $arg2);
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, $titleQuestion);
}
