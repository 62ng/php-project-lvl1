<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

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
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($essens);

    for ($i = 0; $i < ROUNDS; $i++) {
        [$roundQuestion, $correctAnswer] = $questionsAndAnswers[$i];

        line("Question: %s", $roundQuestion);
        $userAnswer = prompt('Your answer');

        $result = checkRound($userName, $userAnswer, $correctAnswer);
        if (!$result) {
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
