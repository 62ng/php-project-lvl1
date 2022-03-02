<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function startGame(string $essens): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($essens);

    return $name;
}

function randomNum(): int
{
    $startRange = 1;
    $endRange = 10;

    return rand($startRange, $endRange);
}

function getAnswer(string $question): string
{
    line("Question: %s", $question);
    return prompt('Your answer');
}

function checkRound(string $userName, mixed $userAnswer, mixed $correctAnswer): bool
{
    if ($userAnswer === $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line(
            "'%s' is wrong answer ;(. Correct answer was '%s'.",
            $userAnswer,
            $correctAnswer
        );
        line("Let's try again, %s!", $userName);
        return false;
    }
}

function endGame(string $userName): void
{
    line("Congratulations, %s!", $userName);
}
