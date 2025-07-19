<?php

namespace BrainGames\GameProcess;

use function cli\line;
use function cli\prompt;

function runGameProcess(string $gameTask, callable $getRoundData): void
{
    $roundsCount = 3;
    line('Welcome to the Brain Game!');

    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line($gameTask);

    for ($i = 0; $i < $roundsCount; $i += 1) {
        [$question, $correctAnswer] = $getRoundData();

        line("Question: %s", $question);

        $userAnswer = prompt('Your answer: ');

        if ($userAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);

            line("Let's try again, %s!", $userName);

            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $userName);
}
