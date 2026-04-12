#!/usr/bin/env php
<?php

namespace Games\BrainProgression;

use function cli\prompt;
use function cli\out;
use function BrainGames\Cli\greetingUser;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\endGame;

function getProgression(int $start, int $step, int $count): array
{
    $progression = [];
    for ($i = 0; $i < $count; $i++) {
        $progression[] = $start + ($i * $step);
    }
    return $progression;
}

function hideElementOfProgression(array $progression, int $index): string
{
    $progression[$index] = '..';
    $formattedProgression = implode(' ', $progression);
    return $formattedProgression;
}

function run(): void
{
    $name = greetingUser();
    out("What number is missing in the progression?\n");

    $counterCorrectAnswers = 0;
    while ($counterCorrectAnswers < 3) {
        $start = rand(1, 100);
        $step = rand(1, 10);
        $count = rand(5, 10);
        $index = rand(0, ($count - 1));
        $progression = getProgression($start, $step, $count);
        $hiddenElement = $progression[$index];
        $formattedProgression = hideElementOfProgression($progression, $index);
        out("Question: $formattedProgression \n");
        $answer = (int)prompt("Your answer");
        $expected = $hiddenElement;
        if (isCorrectAnswer($expected, $answer)) {
               $counterCorrectAnswers++;
        } else {
            break;
        }
    }

    endGame($counterCorrectAnswers, $name);
}
?>
