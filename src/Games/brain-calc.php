<?php

namespace Brain\Calc;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;

const ESSENCE_CALC = 'What is the result of the expression?';

function brainCalcGame(): void
{
    startGame(__NAMESPACE__, ESSENCE_CALC);
}

function roundQuestionAndAnswer()
{
    $operations = ['+', '-', '*'];
    $randomNum1 = randomNum();
    $randomNum2 = randomNum();
    $randomOperationKey = array_rand($operations, 1);
    $randomOperation = $operations[$randomOperationKey];

    return [
        "{$randomNum1} {$randomOperation} {$randomNum2}",
        correctAnswer($randomOperation, $randomNum1, $randomNum2)
    ];
}

function correctAnswer(string $operation, int $num1, int $num2): string
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
