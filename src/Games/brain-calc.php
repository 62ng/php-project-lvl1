<?php

namespace Brain\Calc;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;

use const Brain\Engine\ROUNDS;

const ESSENCE_CALC = 'What is the result of the expression?';

function brainCalcGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $operations = ['+', '-', '*'];
        $randomNum1 = randomNum();
        $randomNum2 = randomNum();
        $randomOperationKey = array_rand($operations, 1);
        $randomOperation = $operations[$randomOperationKey];

        $questionsAndAnswers []= [
            "{$randomNum1} {$randomOperation} {$randomNum2}",
            correctAnswer($randomOperation, $randomNum1, $randomNum2)
        ];
    }

    startGame($questionsAndAnswers, ESSENCE_CALC);
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
