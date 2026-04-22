<?php

namespace Games\BrainEven;

use function BrainGames\Engine\runGame;

function run(): void
{
    runGame(fn() => generateData(), "Answer \"yes\" if the number is even, otherwise answer \"no\". \n");
}

function generateData(): array
{
    $randomNumber = rand();
    $question = "Question: $randomNumber \n";
        $expected = getExpectedAnswer($randomNumber);
    return [
        'question' => $question,
        'answer' => $expected
    ];
}

function isEven(int $randomNumber): bool
{
    return (($randomNumber % 2) === 0);
}

function getExpectedAnswer(int $randomNumber): string
{
    if (isEven($randomNumber)) {
        return "yes";
    } else {
        return "no";
    }
}
