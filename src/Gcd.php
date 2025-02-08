<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\tipeText;
use function BrainGames\Engine\getInformation;
use function BrainGames\Engine\greetingUser;
use function BrainGames\Engine\calc;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\wrongAnswer;
use function BrainGames\Engine\tryAgain;
use function BrainGames\Engine\congratulations;

function run()
{

    $MIN = 0;
    $MAX = 10;

    $randomNumber = 0;
    $currentRightAnswer = null;
    $rightAnserCount = 0;
    $totalRightAnswer = 3;
    $operationsType = ['+', '-', '*'];
    $name = '';
    $userAnswer = null;

    tipeText('Welcome to the Brain Game!');
    getInformation('May I have your name?', $name);
    greetingUser($name);

    while ($rightAnserCount < $totalRightAnswer) {
        $randomNumber1 = rand($MIN, $MAX);
        $randomNumber2 = rand($MIN, $MAX);
        $randomOperation = $operationsType[array_rand($operationsType, 1)];

        $currentRightAnswer = calc($randomNumber1, $randomNumber2, $randomOperation);

        askQuestion("$randomNumber1 $randomOperation $randomNumber2");
        getInformation('Your answer', $userAnswer);

        $answerStr = is_numeric($userAnswer) ? intval($userAnswer) : $userAnswer;

        if ($currentRightAnswer === $answerStr) {
            tipeText("Correct!");
            $rightAnserCount++;
        } else {
            wrongAnswer($answerStr, $currentRightAnswer);
            tryAgain($name);
            break;
        }
        if ($totalRightAnswer === $rightAnserCount) {
            congratulations($name);
        }
    }
}
