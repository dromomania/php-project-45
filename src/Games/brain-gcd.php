<?php

namespace BrainGames\Games\BrainGCD;

use function BrainGames\Engine\runGame;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;
const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function run(): void
{
    runGame(function () {
            $firstNum = rand(MIN_NUMBER, MAX_NUMBER);
            $secondNum = rand(MIN_NUMBER, MAX_NUMBER);
            $question = "Question: $firstNum $secondNum";
            $expected = getGcd($firstNum, $secondNum);

            return [
                'question' => $question,
                'answer' => (string)$expected
            ];
    },
        GAME_DESCRIPTION);
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
