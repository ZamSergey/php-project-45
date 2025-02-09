<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\startBrainGame;

function run()
{
    $count = 3;
    $titleQuestion = "What number is missing in the progression?";
    $questions = [];

    for ($i = 0; $i < $count; $i++) {
        $questions[] = generateQuestions();
    }

    startBrainGame($questions, $titleQuestion);
}

function generateQuestions()
{
    $MIN = 0;
    $MAX = 20;
    $PROGRESSION_LENGTH = 10;
    $MIN_STEP = 1;
    $MAX_STEP = 9;

    $startProgression = rand($MIN, $MAX);
    $stepProgression = rand($MIN_STEP, $MAX_STEP);

    $progression = getProgression($startProgression, $stepProgression, $PROGRESSION_LENGTH);
    $indexOfRigthAnswer = array_rand($progression, 1);
    $rigthAnswer = $progression[$indexOfRigthAnswer];
    $progression[$indexOfRigthAnswer] = "..";
    $question = implode(" ", $progression);

    return [$question, $rigthAnswer];
}

function getProgression($startValue, $step, $length)
{
    $progression = [$startValue];
    for ($i = 1; $i < $length; $i++) {
        $progression[$i] =  $progression[$i - 1] + $step;
    }
    return $progression;
}
