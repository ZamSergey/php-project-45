<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $numberOfQuestions = 3;
    $titleQuestion = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $questions[] = generateQuestions();
    }

    startBrainGame($questions, $titleQuestion);
}

function generateQuestions(): array
{
    $MIN = 0;
    $MAX = 100;

    $arg1 = rand($MIN, $MAX);
    $delimiters = isPrime($arg1);
    $rigthAnswer = count($delimiters) === 0 ? 'yes' : 'no';
    $question = $arg1;

    return [$question, $rigthAnswer];
}

function isPrime(number $number): array
{
    $delimiters = [];
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $delimiters[] = $i;
        }
    }
    return $delimiters;
}
