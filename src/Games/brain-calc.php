<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\runGame;

function run(): void
{
    runGame(fn() => generateData(), "What is the result of the expression?\n");
}

function generateData(): array
{
        $operations = [
		"*" => multiply(...), 
		"+" => summarise(...), 
		"-" => subtract(...)
	];
        $firstNum = rand(1, 100);
        $secondNum = rand(1, 100);

        $randomOperationKey = array_rand($operations);
        $operation = $operations[$randomOperationKey];
    $question = "Question: $firstNum $randomOperationKey $secondNum\n";
        $expected = getExpectedAnswer($firstNum, $secondNum, $operation);

    return [
        'question' => $question,
        'answer' => (string)$expected
    ];
}

function getExpectedAnswer(int $a, int $b, callable $operation): int
{
    return $operation($a, $b);
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
