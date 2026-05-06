<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\runGame;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;
const MIN_ITEMS_OF_PROGRESSION = 5;
const MAX_ITEMS_OF_PROGRESSION = 10;
const MIN_STEP_VALUE = 1;
const MAX_STEP_VALUE = 10;
const GAME_DESCRIPTION = "What number is missing in the progression?";

function run(): void
{
    runGame(function () {
            $start = rand(MIN_NUMBER, MAX_NUMBER);
            $step = rand(MIN_STEP_VALUE, MAX_STEP_VALUE);
            $count = rand(MIN_ITEMS_OF_PROGRESSION, MAX_ITEMS_OF_PROGRESSION);
            $index = rand(0, ($count - 1));
            $progression = getProgression($start, $step, $count);
            $hiddenElement = $progression[$index];
            $formattedProgression = hideElementOfProgression($progression, $index);
            $question = "Question: $formattedProgression";
            $expected = $hiddenElement;

            return [
                'question' => $question,
                'answer' => (string)$expected
            ];
    }, GAME_DESCRIPTION);
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
    return implode(' ', $progression);
}
