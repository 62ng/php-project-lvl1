<?php

namespace Brain\Games;

use function Brain\Engine\printGameEssence;
use function Brain\Engine\getName;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\printCorrect;
use function Brain\Engine\printWrong;
use function Brain\Engine\congratulate;
use const Brain\Engine\ROUNDS;

const
    ESSENCE_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function brainPrime(): void
{
    $userName = getName();
    printGameEssence(ESSENCE_PRIME);

    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum = randomNum();

        $userAnswer = getAnswer("{$randomNum}");
        $correctAnswer = ifPrime($randomNum) ? 'yes' : 'no';

        if ($userAnswer === $correctAnswer) {
            printCorrect();
        } else {
            printWrong($userName, $userAnswer, $correctAnswer);
            exit;
        }
    }

    congratulate($userName);
}

function ifPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
