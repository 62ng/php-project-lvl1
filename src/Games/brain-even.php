<?php

namespace Brain\Even;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;

use const Brain\Engine\ROUNDS;

const ESSENCE_EVEN = 'Answer "yes" if the number is even, otherwiseanswer "no".';

function brainEvenGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum = randomNum();

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
