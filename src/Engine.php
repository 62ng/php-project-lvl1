<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

define('ROUNDS', 3);

function printGameEssence(string $essence): void
{
    line($essence);
}

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function randomNum(): int
{
    $startRange = 1;
    $endRange = 100;

    return rand($startRange, $endRange);
}

function getAnswer(string $question): string
{
    line("Question: %s", $question);
    return prompt('Your answer');
}

function printCorrect(): void
{
    line("Correct!");
}

function printWrong(
    string $userName, 
    string $userAnswer, 
    string $correctAnswer
    ): void
{
    line(
        "'%s' is wrong answer ;(. Correct answer was '%s'.",
        $userAnswer,
        $correctAnswer
    );
    line("Let's try again, %s!", $userName);
}

function congratulate(string $userName): void
{
    line("Congratulations, %s!", $userName);
}
