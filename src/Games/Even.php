<?php

namespace BrainGames\Even;

use function BrainGames\Engine\startBrainGame;

const NUMBER_OF_QUESTION = 3;
const QUESTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN = 0;
const MAX = 100;

function run()
{
    $questions = [];

    for ($i = 0; $i < NUMBER_OF_QUESTION; $i++) {
        $arg1 = rand(MIN, MAX);
        $rigthAnswer = $arg1 % 2 === 0 ? 'yes' : 'no';
        $question = $arg1;
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, QUESTION);
}
