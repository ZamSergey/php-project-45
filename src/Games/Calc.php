<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\Calculate\calculate;

const NUMBER_OF_QUESTIONS = 3;
const QUESTION = "What is the result of the expression?";
const MIN = 0;
const MAX = 10;

function run()
{
    $operationsType = ['+', '-', '*'];
    $questions = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $arg1 = rand(MIN, MAX);
        $arg2 = rand(MIN, MAX);
        $randomOperation = $operationsType[array_rand($operationsType, 1)];
        $question = "$arg1 $randomOperation $arg2";
        $rigthAnswer = calculate($randomOperation, $arg1, $arg2);
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, QUESTION);
}
