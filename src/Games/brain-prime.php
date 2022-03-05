<?php

namespace Brain\Prime;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;

const
    ESSENCE_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function brainPrimeGame(): void
{
    startGame(__NAMESPACE__, ESSENCE_PRIME);
}

function roundQuestionAndAnswer()
{
    $randomNum = randomNum();

    return [
        "{$randomNum}",
        correctAnswer($randomNum) ? 'yes' : 'no'
    ];
}

function correctAnswer(int $num): bool
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
