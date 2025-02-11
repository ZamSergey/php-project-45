<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\Engine\getProgression;

function run()
{
    $numberOfQuestions = 3;
    $titleQuestion = "What number is missing in the progression?";
    $questions = [];

    $MIN = 0;
    $MAX = 20;
    $PROGRESSION_LENGTH = 10;
    $MIN_STEP = 1;
    $MAX_STEP = 9;

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $startProgression = rand($MIN, $MAX);
        $stepProgression = rand($MIN_STEP, $MAX_STEP);

        $progression = getProgression($startProgression, $stepProgression, $PROGRESSION_LENGTH);
        $indexOfRigthAnswer = array_rand($progression, 1);
        $rigthAnswer = $progression[$indexOfRigthAnswer];
        $progression[$indexOfRigthAnswer] = "..";
        $question = implode(" ", $progression);
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, $titleQuestion);
}
