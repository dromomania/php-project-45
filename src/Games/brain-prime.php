<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\runGame;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const GAME_DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}

function generateData(): array
{
    $number = rand(MIN_NUMBER, MAX_NUMBER);
    $question = "Question: $number";
    $expected = isPrime($number) ? "yes" : "no";

    return [
        'question' => $question,
        'answer' => $expected
    ];
}

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    if ($number === 2) {
        return true;
    }
    if ($number % 2 === 0) {
        return false;
    }
    $i = 3;
    $maxFactor = (int)sqrt($number);
    while ($i <= $maxFactor) {
        if ($number % $i === 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}
