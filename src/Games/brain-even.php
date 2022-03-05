<?php

namespace Brain\Even;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;

const ESSENCE_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function brainEvenGame(): void
{
    startGame(__NAMESPACE__, ESSENCE_EVEN);
}

function roundQuestionAndAnswer()
{
    $randomNum = randomNum();
    return [
        "{$randomNum}",
        correctAnswer($randomNum)
    ];
}

function correctAnswer(int $randomNum): string
{
    return (($randomNum % 2) === 0) ? 'yes' : 'no';
}
