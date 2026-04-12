<?php

namespace BrainGames\Engine;

use function cli\out;

function isCorrectAnswer(int|string $expected, int|string $answer): bool
{
    if ($expected === $answer) {
            out("Correct! \n");
            return true;
    } else {
            out("'$answer' is wrong answer ;(. Correct answer was '$expected'. \n");
            return false;
    }
}

function endGame(int $counterCorrectAnswers, string $name): void
{
    if ($counterCorrectAnswers === 3) {
            out("Congratulations, $name!\n");
    } else {
            out("Let's try again, $name!\n");
    }
}
