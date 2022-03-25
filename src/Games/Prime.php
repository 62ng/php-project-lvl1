<?php

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const
    ESSENCE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomFrom = 1;
        $randomTo = 100;
        $randomNum = rand($randomFrom, $randomTo);

        $questionsAndAnswers [] = [
            $randomNum,
            isPrime($randomNum) ? 'yes' : 'no'
        ];
    }

    startGame($questionsAndAnswers, ESSENCE);
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    if ($num == 2 || $num == 3) {
        return true;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
