<?php

/**
 * Brain Calc game
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
use function Brain\Games\Engine\randomArrayElement;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\printCorrect;
use function Brain\Games\Engine\printWrong;
use function Brain\Games\Engine\congratulate;

$userName = getName();
printGameEssence('What is the result of the expression?');

$operations = ['+', '-', '*'];
for ($i = 0; $i < 3; $i++) {
    $randomNum1 = randomNum();
    $randomNum2 = randomNum();
    $randomOperation = randomArrayElement($operations);

    $userAnswer = getAnswer("{$randomNum1} {$randomOperation} {$randomNum2}");
    $correctAnswer = eval("return {$randomNum1} {$randomOperation} {$randomNum2};");

    if ((int) $userAnswer == (int) $correctAnswer) {
        printCorrect();
    } else {
        printWrong($userName, $userAnswer, $correctAnswer);
        exit;
    }
}

congratulate($userName);
