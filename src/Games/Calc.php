<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GameProcess\runGameProcess;

function calculate($operator, $number1, $number2)
{
    switch ($operator) {
        case '-':
            return $number1 - $number2;
        case '+':
            return $number1 + $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new \Exception("Unknown operator: $operator");
    }
}

function getRoundData()
{
    $operators = ['+', '-', '*'];
    $operator = $operators[rand(0, count($operators) - 1)];
    $number1 = random_int(0, 100);
    $number2 = random_int(0, 100);

    $expression = "$number1 $operator $number2";

    $answer = (string) calculate($operator, $number1, $number2);

    return [$expression, $answer];
}

function playGame()
{
    return runGameProcess(
        'What is the result of the expression?',
        __NAMESPACE__ . '\\getRoundData'
    );
}
