<?php

namespace BrainGames\Games\Prime;

use function BrainGames\GameProcess\runGameProcess;

function isPrime(int $num)
{
    if ($num <= 1) {
        return false;
    }

    for ($i = 2; $i ** 2 <= $num; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}


function getRoundData()
{
    $hiddenNumber = random_int(0, 100);
    $isHiddenNumberPrime = isPrime($hiddenNumber);

    return [$hiddenNumber, $isHiddenNumberPrime ? 'yes' : 'no'];
}

function playGame()
{
    return runGameProcess(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        __NAMESPACE__ . '\\getRoundData'
    );
}
