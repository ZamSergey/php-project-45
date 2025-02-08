<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function tipeText($text)
{
    line($text);
}

function askQuestion($question)
{
    line("Question: %s", $question);
}

function greetingUser($name)
{
    line("Hello, %s!", $name);
}

function congratulations($name)
{
    line("Congratulations, %s", $name);
}

function getInformation($question, &$data)
{
    $data = prompt($question);
    return $data;
}

function wrongAnswer($wrong, $write)
{
    line("'$wrong' is wrong answer ;(. Correct answer was '$write'");
}

function tryAgain($name)
{
    line("Let's try again,  %s!", $name);
}

function calc($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
            return $arg1 + $arg2;
        case '-':
            return $arg1 - $arg2;
        case '*':
            return $arg1 * $arg2;
        default:
            break;
    }
}

function startBrainGame($questionAnswer, $titleQuestion)
{
   
 
    $name = '';
    $userAnswer = null;
    
    tipeText('Welcome to the Brain Game!');
    getInformation('May I have your name?', $name);
    greetingUser($name);
    line($titleQuestion);

    for ($currentQuestion = 0, $countAnswer = count($questionAnswer) - 1; $currentQuestion <= $countAnswer; $currentQuestion++ ) {
        
        $question = $questionAnswer[$currentQuestion][0];
        $anser = $questionAnswer[$currentQuestion][1];

        askQuestion($question);
        getInformation('Your answer', $userAnswer);

        $answerStr = is_numeric($userAnswer) ? intval($userAnswer) : $userAnswer;

        if ($anser === $answerStr) {
            tipeText("Correct!");
            
        } else {
            wrongAnswer($answerStr, $anser);
            tryAgain($name);
            break;
        }
        if ($countAnswer === $currentQuestion) {
            congratulations($name);
        }
    }
}