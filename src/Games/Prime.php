<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\IsPrime\isPrime;

const NUMBER_OF_QUESTIONS = 3;
const QUESTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN = 0;
const MAX = 100;

function run()
{
    $questions = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $arg1 = rand(MIN, MAX);

        $rigthAnswer = isPrime($arg1) ? 'yes' : 'no';
        $question = $arg1;
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, QUESTION);
}
