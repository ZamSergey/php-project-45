<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function run()
{

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $MIN = 0;
    $MAX = 100;

    $randomNumber = 0;
    $isEven = null;
    $rightAnserCount = 0;
    $totalRightAnswer = 3;
    $answerArr = ['no', 'yes'];
    while ($rightAnserCount < $totalRightAnswer) {
        $randomNumber = rand($MIN, $MAX);
        $isEven = $randomNumber % 2 === 0 ? 1 : 0;
        line("Question: %s", $randomNumber);
        $answerStr = prompt('Your answer');
        $answerNum = null;

        if ($answerStr === "yes" || $answerStr === "no") {
            $answerNum = $answerStr === "yes" ? 1 : 0;
        }

        if ($isEven === $answerNum) {
            line("Correct!");
            $rightAnserCount++;
        } else {
            line("'$answerStr' is wrong answer ;(. Correct answer was '$answerArr[$isEven]'");
            line("Let's try again,  %s!", $name);
            break;
        }
        if ($totalRightAnswer === $rightAnserCount) {
            line("Congratulations, %s", $name);
        }
    }
}
