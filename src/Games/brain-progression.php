<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\runGame;

function run(): void
{
    runGame(fn() => generateData(), "What number is missing in the progression?\n");
}

function generateData(): array
{
        $start = rand(1, 100);
        $step = rand(1, 10);
        $count = rand(5, 10);
        $index = rand(0, ($count - 1));
        $progression = getProgression($start, $step, $count);
        $hiddenElement = $progression[$index];
        $formattedProgression = hideElementOfProgression($progression, $index);
        $question = "Question: $formattedProgression \n";
        $expected = $hiddenElement;

    return [
            'question' => $question,
            'answer' => $expected
        ];
}

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
