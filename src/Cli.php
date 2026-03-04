<?php

namespace BrainGames\Cli;

use function cli\prompt;

# use function cli\;
function greetingUser()
{
    $name = prompt("May I have your name?");
    $greeting = "Hello, $name!";
    echo $greeting;
}
