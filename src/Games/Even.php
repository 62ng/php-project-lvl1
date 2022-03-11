<?php

namespace Php\Project\Lvl1\Even;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE_EVEN = 'Answer "yes" if the number is even, otherwiseanswer "no".';

function brainEvenGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum = rand(1, 100);

        $questionsAndAnswers [] = [
            "{$randomNum}",
            correctAnswer($randomNum)
        ];
    }

    startGame($questionsAndAnswers, ESSENCE_EVEN);
}

function correctAnswer(int $randomNum): string
{
    return (($randomNum % 2) === 0) ? 'yes' : 'no';
}
