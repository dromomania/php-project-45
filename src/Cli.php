<?php

namespace BrainGames\Cli;

use function cli\prompt;
use function cli\out;

function greetingUser(): void
{
    $name = prompt("May I have your name?");
    out("Hello, $name!\n");
}
