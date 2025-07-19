<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameProcess\runGameProcess;

function isEven($number)
{
    return $number % 2 === 0;
}

function getRoundData()
{
    $hiddenNumber = rand(0, 100);

    return [$hiddenNumber, isEven($hiddenNumber) ? 'yes' : 'no'];
}

function playEvenGame()
{
    return runGameProcess(
        'Answer "yes" if the number is even, otherwise answer "no".',
        __NAMESPACE__ . '\\getRoundData'
    );
}
