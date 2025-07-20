<?php

namespace BrainGames\Games\Progression;

use function BrainGames\GameProcess\runGameProcess;

function generateProgression(int $length, int $start, int $step)
{
    $result = [];

    for ($i = 0; $i < $length; $i += 1) {
        $item = $start + $i * $step;
        $result[] = $item;
    }

    return $result;
}

function getRoundData()
{
    $minProgressionLength = 5;
    $progressionLength = random_int($minProgressionLength, 10);
    $startNumber = random_int(0, 100);
    $progressionStep = random_int(1, 5);

    $progression = generateProgression($progressionLength, $startNumber, $progressionStep);

    $hiddenIndex = random_int(0, count($progression) - 1);
    $hiddenNumber = $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';
    $progressionString = join(' ', $progression);

    return [$progressionString, (string) $hiddenNumber];
}

function playGame()
{
    return runGameProcess(
        'What number is missing in the progression?',
        __NAMESPACE__ . '\\getRoundData'
    );
}
