<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function welcome(string $essens): string
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

function checkRound(string $userName, string $userAnswer, string $correctAnswer): bool
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

function startGame(array $questionsAndAnswers, string $essence): void
{
    $userName = welcome($essence);

    for ($i = 0; $i < ROUNDS; $i++) {
        [$roundQuestion, $correctAnswer] = $questionsAndAnswers[$i];
        $userAnswer = getAnswer($roundQuestion);

        $result = checkRound($userName, $userAnswer, $correctAnswer);
        if (!$result) {
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
