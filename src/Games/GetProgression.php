<?php

namespace BrainGames\GetProgression;

function getProgression(int $startValue, int $step, int $length): array
{
    $progression = [$startValue];
    for ($i = 1; $i < $length; $i++) {
        $progression[$i] =  $progression[$i - 1] + $step;
    }
    return $progression;
}
