<?php

namespace BrainGames\Even;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $count = 3;
    $titleQuestion = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];
    for ($i = 0; $i < $count; $i++) {
        $questions[] = generateQuestions();
    }

    startBrainGame($questions, $titleQuestion);
}

function generateQuestions()
{
    $MIN = 0;
    $MAX = 100;

    $arg1 = rand($MIN, $MAX);

    $rigthAnswer = $arg1 % 2 === 0 ? 'yes' : 'no';
    $question = $arg1;

    return [$question, $rigthAnswer];
}
