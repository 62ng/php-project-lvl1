<?php

namespace Brain\Games;

use function Brain\Engine\printGameEssence;
use function Brain\Engine\getName;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\printCorrect;
use function Brain\Engine\printWrong;
use function Brain\Engine\congratulate;

define('ESSENCE_GCD', 'Find the greatest common divisor of given numbers.');

function brainGCD(): void
{
    $userName = getName();
    printGameEssence(ESSENCE_GCD);

    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum1 = randomNum();
        $randomNum2 = randomNum();

        $userGCD = (int) getAnswer("{$randomNum1} {$randomNum2}");
        $correctGCD = findGCD($randomNum1, $randomNum2);

        if ($userGCD == $correctGCD) {
            printCorrect();
        } else {
            printWrong($userName, $userGCD, $correctGCD);
            exit;
        }
    }

    congratulate($userName);
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
