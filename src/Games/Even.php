<?php

namespace Php\Project\Lvl1\Even;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE = 'Answer "yes" if the number is even, otherwiseanswer "no".';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomFrom = 1;
        $randomTo = 100;
        $randomNum = rand($randomFrom, $randomTo);

        $questionsAndAnswers [] = [
            "{$randomNum}",
            isEven($randomNum) ? 'yes' : 'no'
        ];
    }

    startGame($questionsAndAnswers, ESSENCE);
}

function isEven(int $num): bool
{
    return (($num % 2) === 0);
}
