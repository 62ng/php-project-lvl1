<?php

namespace Brain\Gcd;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\checkRound;
use function Brain\Engine\endGame;

use const Brain\Engine\ROUNDS;

const ESSENCE_GCD = 'Find the greatest common divisor of given numbers.';

function brainGCD(): void
{
    $userName = startGame(ESSENCE_GCD);

    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum1 = randomNum();
        $randomNum2 = randomNum();

        $userAnswer = (int) getAnswer("{$randomNum1} {$randomNum2}");
        $correctAnswer = findGCD($randomNum1, $randomNum2);

        $result = checkRound($userName, $userAnswer, $correctAnswer);
        if (!$result) {
            return;
        }
    }

    endGame($userName);
}

function findGCD(int $num1, int $num2): int
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
