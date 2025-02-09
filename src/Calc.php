<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $count = 3;
    $titleQuestion = "What is the result of the expression?";
    $questions = [];
    for ($i = 0; $i < $count; $i++) {
        $questions[] = generateQuestions();
    }

    startBrainGame($questions, $titleQuestion);
}

function generateQuestions()
{
    $MIN = 0;
    $MAX = 10;
    $operationsType = ['+', '-', '*'];
    $arg1 = rand($MIN, $MAX);
    $arg2 = rand($MIN, $MAX);
    $randomOperation = $operationsType[array_rand($operationsType, 1)];
    $rigthAnswer = null;
    $question = "$arg1 $randomOperation $arg2";

    switch ($randomOperation) {
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

    return [$question, $rigthAnswer];
}
