<?php
namespace BrainGames\Engine;

function isCorrectAnswer($expected, $answer) {
        if ($expected === $answer) {
                echo "Correct!" . "\n";
                return true;
        } else {
                echo "'$answer' is wrong answer ;(. Correct answer was '$expected'." . "\n";
                return false;
        }
}

function endGame($counterCorrectAnswers, $name) {
        if ($counterCorrectAnswers === 3) {
                echo "Congratulations, $name!" . "\n";
        } else {
                echo "Let's try again, $name!" . "\n";
        }
}


?>
