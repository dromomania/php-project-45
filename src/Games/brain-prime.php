#!/usr/bin/env php
<?php

namespace Games\BrainPrime;

use function cli\prompt;
use function cli\out;
use function BrainGames\Cli\greetingUser;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\endGame;

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
    if ($number == 2) {
            return true;
    }
    if ($number % 2 == 0) {
        return false;
    }
    $i = 3;
    $maxFactor = (int)sqrt($number);
    while ($i <= $maxFactor) {
        if ($number % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}

function run(): void
{
    $name = greetingUser();
    echo out("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");

    $counterCorrectAnswers = 0;
    while ($counterCorrectAnswers < 3) {
        $number = rand(0, 100);
        echo out("Question: $number \n");
        $answer = prompt("Your answer");
        $expected = getExpectedAnswer($number);
        if (isCorrectAnswer($expected, $answer)) {
               $counterCorrectAnswers++;
        } else {
            break;
        }
    }

    endGame($counterCorrectAnswers, $name);
}

?>
