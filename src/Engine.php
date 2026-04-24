<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(callable $dataGenerator, string $gameDescription): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, $name!");

    line($gameDescription);

    $counterCorrectAnswers = 0;
    for ($i = 0; $i < 3; $i++) {
        $roundData = $dataGenerator();
        line($roundData['question']);
        $answer = prompt('Your answer');
        if (isCorrectAnswer($roundData['answer'], $answer)) {
            $counterCorrectAnswers++;
        } else {
            break;
        }
    }
    endGame($counterCorrectAnswers, $name);
}

function isCorrectAnswer(string $expected, string $answer): bool
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
