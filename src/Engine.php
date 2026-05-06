<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_GAMES = 3;

function runGame(callable $dataGenerator, string $gameDescription): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, $name!");

    line($gameDescription);

    for ($i = 0; $i < NUMBER_OF_GAMES; $i++) {
        $roundData = $dataGenerator();
        line($roundData['question']);
        $answer = prompt('Your answer');
        $expected = $roundData['answer'];
        if ($expected === $answer) {
            line("Correct!");
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$expected'.");
            line("Let's try again, $name!");
            return;
        }
    }

    line("Congratulations, $name!");
}
