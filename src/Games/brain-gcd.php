<?php

namespace Brain\Gcd;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;

const ESSENCE_GCD = 'Find the greatest common divisor of given numbers.';

function brainGCDGame(): void
{
    startGame(__NAMESPACE__, ESSENCE_GCD);
}

function roundQuestionAndAnswer()
{
    $randomNum1 = randomNum();
    $randomNum2 = randomNum();

    return [
        "{$randomNum1} {$randomNum2}",
        correctAnswer($randomNum1, $randomNum2)
    ];
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
