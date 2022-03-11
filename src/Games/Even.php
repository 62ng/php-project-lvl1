<?php

namespace Php\Project\Lvl1\Even;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE_EVEN = 'Answer "yes" if the number is even, otherwiseanswer "no".';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum = rand(1, 100);

        $questionsAndAnswers [] = [
            "{$randomNum}",
            getCorrectAnswer($randomNum)
        ];
    }

    startGame($questionsAndAnswers, ESSENCE_EVEN);
}

function getCorrectAnswer(int $randomNum): string
{
    return (($randomNum % 2) === 0) ? 'yes' : 'no';
}
