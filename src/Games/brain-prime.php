<?php

namespace Games\BrainPrime;

use function BrainGames\Engine\runGame;

function run(): void
{
    runGame(fn() => generateData(), "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
}

function generateData(): array
{
        $number = rand(0, 100);
    $question = "Question: $number \n";
        $expected = getExpectedAnswer($number);

    return [
            'question' => $question,
            'answer' => (string)$expected
    ];
}

function getExpectedAnswer(int $number): string
{
    if (isPrime($number)) {
        return 'yes';
    } else {
        return 'no';
    }
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
