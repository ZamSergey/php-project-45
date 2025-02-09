<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startBrainGame($questionAnswer, $titleQuestion)
{

    $name = '';
    $userAnswer = null;

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($titleQuestion);

    for ($i = 0, $countAnswer = count($questionAnswer) - 1; $i <= $countAnswer; $i++) {
        $question = $questionAnswer[$i][0];
        $anser = $questionAnswer[$i][1];

        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        $answerStr = is_numeric($userAnswer) ? intval($userAnswer) : $userAnswer;

        if ($anser === $answerStr) {
            line("Correct!");
        } else {
            line("'$answerStr' is wrong answer ;(. Correct answer was '$anser'");
            line("Let's try again,  %s!", $name);
            break;
        }
        if ($countAnswer === $i) {
            line("Congratulations, %s!", $name);
        }
    }
}
