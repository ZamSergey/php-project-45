<?php

namespace BrainGames\Even;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $numberOfQuestions = 3;
    $titleQuestion = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];

    $MIN = 0;
    $MAX = 100;

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $arg1 = rand($MIN, $MAX);
        $rigthAnswer = $arg1 % 2 === 0 ? 'yes' : 'no';
        $question = $arg1;
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, $titleQuestion);
}
