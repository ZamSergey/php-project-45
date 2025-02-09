<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $count = 3;
    $titleQuestion = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
    $delimiters = isPrime($arg1);
    $rigthAnswer = count($delimiters) === 0 ? 'yes' : 'no';
    $question = $arg1;

    return [$question, $rigthAnswer];
}

function isPrime($number)
{
    $delimiters = [];
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $delimiters[] = $i;
        }
    }
    return $delimiters;
}
