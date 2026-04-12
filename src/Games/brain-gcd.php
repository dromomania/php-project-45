#!/usr/bin/env php
<?php

namespace Games\BrainGCD;

use function cli\prompt;
use function cli\out;
use function BrainGames\Cli\greetingUser;
use function BrainGames\Engine\isCorrectAnswer;
use function BrainGames\Engine\endGame;

function getGcd($firstNum, $secondNum)
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

function run()
{
    $name = greetingUser();
    echo out("Find the greatest common divisor of given numbers. \n");

    $counterCorrectAnswers = 0;
    while ($counterCorrectAnswers < 3) {
            $firstNum = rand(1, 100);
            $secondNum = rand(1, 100);
            echo out("Question: $firstNum $secondNum \n");
            $answer = (int)prompt("Your answer");
        $expected = getGcd($firstNum, $secondNum);
        if (isCorrectAnswer($expected, $answer)) {
                $counterCorrectAnswers++;
        } else {
                break;
        }
    }

    endGame($counterCorrectAnswers, $name);
}

?>
