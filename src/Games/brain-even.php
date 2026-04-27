<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}

function generateData(): array
{
    $randomNumber = rand();
    $question = "Question: $randomNumber";
    $expected = isEven($randomNumber) ? "yes" : "no";
    return [
        'question' => $question,
        'answer' => $expected
    ];
}

function isEven(int $randomNumber): bool
{
    return (($randomNumber % 2) === 0);
}
