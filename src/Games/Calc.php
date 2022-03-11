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
        $randomNum1 = rand(1, 10);
        $randomNum2 = rand(1, 10);
        $randomOperationKey = array_rand($operations, 1);
        $randomOperation = $operations[$randomOperationKey];

        $questionsAndAnswers [] = [
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
