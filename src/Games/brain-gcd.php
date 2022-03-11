<?php

namespace Brain\Gcd;

use function Brain\Engine\startGame;

use const Brain\Engine\ROUNDS;

const ESSENCE_GCD = 'Find the greatest common divisor of given numbers.';

function brainGCDGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum1 = rand(1, 100);
        $randomNum2 = rand(1, 100);

        $questionsAndAnswers [] = [
            "{$randomNum1} {$randomNum2}",
            correctAnswer($randomNum1, $randomNum2)
        ];
    }

    startGame($questionsAndAnswers, ESSENCE_GCD);
}

function correctAnswer(int $num1, int $num2): string
{
    $minNum = min($num1, $num2);
    $result = 1;
    for ($i = 1; $i <= $minNum; $i++) {
        if ((($num1 % $i) == 0) && (($num2 % $i) == 0)) {
            $result = $i;
        }
    }

    return $result;
}
