<?php
namespace BrainGames\Engine;

use function cli\out;

function isCorrectAnswer($expected, $answer) {
        if ($expected === $answer) {
                echo out("Correct! \n");
                return true;
        } else {
                echo out("'$answer' is wrong answer ;(. Correct answer was '$expected'. \n");
                return false;
        }
}

function endGame($counterCorrectAnswers, $name) {
        if ($counterCorrectAnswers === 3) {
                echo out("Congratulations, $name!\n");
        } else {
                echo out("Let's try again, $name!\n");
        }
}


?>
