<?php

namespace Games\BrainGCD;

use function BrainGames\Engine\runGame;

function run(): void
{
    runGame(fn() => generateData(), "Find the greatest common divisor of given numbers. \n");
}


function generateData(): array
{
    $firstNum = rand(1, 100);
        $secondNum = rand(1, 100);
        $question = "Question: $firstNum $secondNum \n";
        $expected = getGcd($firstNum, $secondNum);

    return [
            'question' => $question,
            'answer' => $expected
        ];
}

function getGcd(int $firstNum, int $secondNum): int
{
    while ($firstNum !== $secondNum) {
        if ($firstNum > $secondNum) {
            $firstNum = $firstNum - $secondNum;
        } else {
            $secondNum = $secondNum - $firstNum;
        }
    }
    return $firstNum;
}
