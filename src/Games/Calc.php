<?php

namespace Php\Project\Lvl1\Calc;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE_CALC = 'What is the result of the expression?';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $operations = ['+', '-', '*'];
        $randomFrom = 1;
        $randomTo = 10;
        $randomNum1 = rand($randomFrom, $randomTo);
        $randomNum2 = rand($randomFrom, $randomTo);
        $randomOperationKey = array_rand($operations);
        $randomOperation = $operations[$randomOperationKey];

        $questionsAndAnswers [] = [
            "{$randomNum1} {$randomOperation} {$randomNum2}",
            getOperationValue($randomOperation, $randomNum1, $randomNum2)
        ];
    }

    startGame($questionsAndAnswers, ESSENCE_CALC);
}

function getOperationValue(string $operation, int $num1, int $num2): string
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
