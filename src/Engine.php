<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ITERATIONS = 3;

function runGame(callable $dataGenerator, string $gameDescription): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, $name!");

    line($gameDescription);

    $counterCorrectAnswers = 0;
    for ($i = 0; $i < NUMBER_OF_ITERATIONS; $i++) {
        $roundData = $dataGenerator();
        line($roundData['question']);
        $answer = prompt('Your answer');
        $expected = $roundData['answer'];
        if ($expected === $answer) {
            line("Correct!");
            $counterCorrectAnswers++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$expected'.");
            break;
        }
    }

    if ($counterCorrectAnswers === NUMBER_OF_ITERATIONS) {
        line("Congratulations, $name!");
    } else {
        line("Let's try again, $name!");
    }
}

