<?php

/**
 * Brain GCD game
 * php version 7.4.0
 *
 * @category None
 * @package  None
 * @author   An <an@an.org>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     None
 **/

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Brain\Games\Engine\printGameEssence;
use function Brain\Games\Engine\getName;
use function Brain\Games\Engine\randomNum;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\printCorrect;
use function Brain\Games\Engine\printWrong;
use function Brain\Games\Engine\congratulate;

$userName = getName();
printGameEssence('Find the greatest common divisor of given numbers.');

for ($i = 0; $i < 3; $i++) {
    $randomNum1 = randomNum();
    $randomNum2 = randomNum();

    $minRandomNum = min($randomNum1, $randomNum2);
    $correctGCD = 1;
    for ($gcd = 1; $gcd <= $minRandomNum; $gcd++) {
        if ((($randomNum1 % $gcd) == 0) && (($randomNum2 % $gcd) == 0)) {
            $correctGCD = $gcd;
        }
    }
    $userGCD = getAnswer("{$randomNum1} {$randomNum2}");

    if ((int) $userGCD == (int) $correctGCD) {
        printCorrect();
    } else {
        printWrong($userName, $userGCD, $correctGCD);
        exit;
    }
}

congratulate($userName);
