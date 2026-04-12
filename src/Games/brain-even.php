#!/usr/bin/env php
<?php

namespace Games\BrainEven;

use function cli\prompt;
use function cli\out;
use function BrainGames\Cli\greetingUser;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\endGame;

function isEven(int $randomNumber): bool
{
    return (($randomNumber % 2) === 0);
}

function getExpectedAnswer(int $randomNumber): string
{
    if (isEven($randomNumber)) {
        return "yes";
    } else {
        return "no";
    }
}

function run(): void
{
    $name = greetingUser();
    out("Answer \"yes\" if the number is even, otherwise answer \"no\". \n");

    $counterCorrectAnswers = 0;
    while ($counterCorrectAnswers < 3) {
        $randomNumber = rand();
        out("Question: $randomNumber \n");
        $answer = prompt("Your answer");
        $expected = getExpectedAnswer($randomNumber);
        if (isCorrectAnswer($expected, $answer)) {
                $counterCorrectAnswers++;
        } else {
            break;
        }
    }


    endGame($counterCorrectAnswers, $name);
}
?>
