<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = "What is the result of the expression?";
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}

function generateData(): array
{
    $operations = [
        "*" => multiply(...),
        "+" => summarise(...),
        "-" => subtract(...)
    ];

    $firstNum = rand(MIN_NUMBER, MAX_NUMBER);
    $secondNum = rand(MIN_NUMBER, MAX_NUMBER);

    $randomOperationKey = array_rand($operations);
    $operation = $operations[$randomOperationKey];
    $question = "Question: $firstNum $randomOperationKey $secondNum";
    $expected = $operation($firstNum, $secondNum);

    return [
        'question' => $question,
        'answer' => (string)$expected
    ];
}

function multiply(int $a, int $b): int
{
    return $a * $b;
}

function summarise(int $a, int $b): int
{
    return $a + $b;
}

function subtract(int $a, int $b): int
{
    return $a - $b;
}
