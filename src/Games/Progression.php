<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\startBrainGame;
use function BrainGames\GetProgression\getProgression;

const NUMBER_OF_QUESTIONS = 3;
const QUESTION = "What number is missing in the progression?";
const MIN = 0;
const MAX = 20;
const PROGRESSION_LENGTH = 10;
const MIN_PROGRESSION_STEP = 1;
const MAX_PROGRESSION_STEP = 9;

function run()
{
    $questions = [];

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $startProgression = rand(MIN, MAX);
        $stepProgression = rand(MIN_PROGRESSION_STEP, MAX_PROGRESSION_STEP);

        $progression = getProgression($startProgression, $stepProgression, PROGRESSION_LENGTH);
        $indexOfRigthAnswer = array_rand($progression, 1);
        $rigthAnswer = $progression[$indexOfRigthAnswer];
        $progression[$indexOfRigthAnswer] = "..";
        $question = implode(" ", $progression);
        $questions[] = ['question' => $question, 'answer' => $rigthAnswer];
    }

    startBrainGame($questions, QUESTION);
}
