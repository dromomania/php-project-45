<?php

namespace BrainGames\Cli;

use function cli\prompt;

function greetingUser()
{
    $name = prompt("May I have your name?");
    $greeting = "Hello, $name!\n";
    echo $greeting;
    return $name;
}
