<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\GameProcess\runGameProcess;

function getGcd(int $number1, int $number2)
{
    $a = $number1;
    $b = $number2;

    while ($a && $b) {
        if ($a > $b) {
            $a %= $b;
        } else {
            $b %= $a;
        }
    }

    $a += $b;

    return $a;
}

function getRoundData()
{
    $number1 = random_int(0, 100);
    $number2 = random_int(0, 100);

    $expression = "$number1 $number2";

    $answer = (string) getGcd($number1, $number2);

    return [$expression, $answer];
}

function playGame()
{
    return runGameProcess(
        'Find the greatest common divisor of given numbers.',
        __NAMESPACE__ . '\\getRoundData'
    );
}
