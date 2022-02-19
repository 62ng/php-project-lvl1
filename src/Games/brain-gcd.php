<?php

/**
 * Brain GCD game functions
 * php version 7.4.0
 *
 * @category None
 * @package  None
 * @author   An <internet.buro@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     None
 **/

namespace Brain\Games;

use function Brain\Engine\printGameEssence;
use function Brain\Engine\getName;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\printCorrect;
use function Brain\Engine\printWrong;
use function Brain\Engine\congratulate;

/**
 * Brain GCD game
 *
 * @return void
 **/
function brainGCD()
{
    $userName = getName();
    printGameEssence('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < 3; $i++) {
        $randomNum1 = randomNum();
        $randomNum2 = randomNum();

        $userGCD = getAnswer("{$randomNum1} {$randomNum2}");
        $correctGCD = findGCD($randomNum1, $randomNum2);

        if ((int) $userGCD == $correctGCD) {
            printCorrect();
        } else {
            printWrong($userName, $userGCD, $correctGCD);
            exit;
        }
    }

    congratulate($userName);
}

/**
 * Find the greatest common divisor
 *
 * @param int $num1 1-st number
 * @param int $num2 2-nd number
 *
 * @return int
 **/
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
