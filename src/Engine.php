<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startBrainGame(array $questionAnswer, string $titleQuestion): void
{

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($titleQuestion);

    foreach ($questionAnswer as $item) {
        line("Question: %s", $item['question']);
        $userAnswer = prompt('Your answer');
        $answer = $item['answer'];
        $answerStr = is_numeric($userAnswer) ? intval($userAnswer) : $userAnswer;

        if ($answer !== $answerStr) {
            line("'$answerStr' is wrong answer ;(. Correct answer was '$answer'");
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
