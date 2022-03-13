<?php

namespace Php\Project\Lvl1\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function startGame(array $questionsAndAnswers, string $essence): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($essence);

    foreach ($questionsAndAnswers as [$roundQuestion, $correctAnswer]) {
        line("Question: %s", $roundQuestion);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $userAnswer,
                $correctAnswer
            );
            line("Let's try again, %s!", $userName);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $userName);
}
