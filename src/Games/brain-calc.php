<?php

/**
 * Brain Calc game functions
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

define('ESSENCE_CALC', 'What is the result of the expression?');

/**
 * Brain Calc game
 *
 * @return void
 **/
function brainCalc()
{
    $userName = getName();
    printGameEssence(ESSENCE_CALC);

    $operations = ['+', '-', '*'];
    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum1 = randomNum();
        $randomNum2 = randomNum();
        $randomOperationKey = array_rand($operations, 1);
        $randomOperation = $operations[$randomOperationKey];

        $userAnswer = (int) getAnswer(
            "{$randomNum1} {$randomOperation} {$randomNum2}"
        );
        $correctAnswer = calc($randomOperation, $randomNum1, $randomNum2);

        if ($userAnswer == $correctAnswer) {
            printCorrect();
        } else {
            printWrong($userName, $userAnswer, $correctAnswer);
            return;
        }
    }

    congratulate($userName);
}

/**
 * Calc expression
 *
 * @param string $operation One of the arithmetic operation type (+, -, *)
 * @param int    $num1      1-st number
 * @param int    $num2      2-nd number
 *
 * @return int
 **/
function calc(string $operation, int $num1, int $num2): int
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }

    return 0;
}
