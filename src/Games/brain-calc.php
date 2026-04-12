#!/usr/bin/env php
<?php

namespace Games\BrainCalc;

use function cli\prompt;
use function cli\out;
use function BrainGames\Cli\greetingUser;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\endGame;

function getExpectedAnswer(int $a, int $b, callable $operation): int
{
    $result = $operation($a, $b);
    return $result;
}

function multiply(int $a, int $b): int
{
    $result = $a * $b;
    return $result;
}

function summarise(int $a, int $b): int
{
    $result = $a + $b;
    return $result;
}

function subtract(int $a, int $b): int
{
    $result = $a - $b;
    return $result;
}

function run(): void
{
    $name = greetingUser();
    echo out("What is the result of the expression? \n");

    $operations = ["*" => multiply(...), "+" => summarise(...), "-" => subtract(...)];

    $counterCorrectAnswers = 0;
    while ($counterCorrectAnswers < 3) {
        $firstNum = rand(1, 100);
        $secondNum = rand(1, 100);
        $randomOperationKey = array_rand($operations);
        $operation = $operations[$randomOperationKey];
        echo out("Question: $firstNum $randomOperationKey $secondNum \n");
        $answer = (int)prompt("Your answer");
        $expected = getExpectedAnswer($firstNum, $secondNum, $operation);
        if (isCorrectAnswer($expected, $answer)) {
            $counterCorrectAnswers++;
        } else {
            break;
        }
    }

    endGame($counterCorrectAnswers, $name);
}

?>
