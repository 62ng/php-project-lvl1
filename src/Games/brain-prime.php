<?php

namespace Brain\Prime;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\checkRound;
use function Brain\Engine\endGame;

use const Brain\Engine\ROUNDS;

const
    ESSENCE_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function brainPrime(): void
{
    $userName = startGame(ESSENCE_PRIME);

    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum = randomNum();

        $userAnswer = getAnswer("{$randomNum}");
        $correctAnswer = ifPrime($randomNum) ? 'yes' : 'no';

        $result = checkRound($userName, $userAnswer, $correctAnswer);
        if (!$result) {
            return;
        }
    }

    endGame($userName);
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
