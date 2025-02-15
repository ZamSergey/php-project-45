<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\startBrainGame;

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

function isPrime(int $number): bool
{
    $delimiters = [];
    $result = false;
    if ($number === 0 || $number === 1) {
        return $result;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $delimiters[] = $i;
        }
    }
    return count($delimiters) === 0;
}
