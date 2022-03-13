<?php

namespace Php\Project\Lvl1\Gcd;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE = 'Find the greatest common divisor of given numbers.';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomFrom = 1;
        $randomTo = 100;
        $randomNum1 = rand($randomFrom, $randomTo);
        $randomNum2 = rand($randomFrom, $randomTo);

        $questionsAndAnswers [] = [
            "{$randomNum1} {$randomNum2}",
            getGCD($randomNum1, $randomNum2)
        ];
    }

    startGame($questionsAndAnswers, ESSENCE);
}

function getGCD(int $num1, int $num2): string
{
    $minNum = min($num1, $num2);
    $gcd = 1;
    for ($i = 1; $i <= $minNum; $i++) {
        if ((($num1 % $i) == 0) && (($num2 % $i) == 0)) {
            $gcd = $i;
        }
    }

    return $gcd;
}
