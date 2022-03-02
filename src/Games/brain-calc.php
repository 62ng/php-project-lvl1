<?php

namespace Brain\Calc;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\checkRound;
use function Brain\Engine\endGame;
use const Brain\Engine\ROUNDS;

const ESSENCE_CALC = 'What is the result of the expression?';

function brainCalc(): void
{
    $userName = startGame(ESSENCE_CALC);

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

        $result = checkRound($userName, $userAnswer, $correctAnswer);
        if (!$result) {
            return;
        }
    }

    endGame($userName);
}

function calc(string $operation, int $num1, int $num2): int
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception('Operation not found!');
    }
}
