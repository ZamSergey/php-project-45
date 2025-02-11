<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\Engine\isPrime;

function run()
{
    $numberOfQuestions = 3;
    $titleQuestion = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions = [];

    $MIN = 0;
    $MAX = 100;

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $arg1 = rand($MIN, $MAX);

        $rigthAnswer = isPrime($arg1) ? 'yes' : 'no';
        $question = $arg1;
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, $titleQuestion);
}
