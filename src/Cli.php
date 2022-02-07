<?php
/**
 * PHP Command Line Tools
 * php version 7.4.0
 *
 * @category None
 * @package  None
 * @author   An <an@an.org>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     None
 **/

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function printGameEssence($essence)
{
    line($essence);
}

/**
 * Function prints hello to user and ask's his name.
 * 
 * @return string
 **/
function getName()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function randomNum(): int
{
    $startRange = 1;
    $endRange = 10;

    return rand($startRange, $endRange);
}

function randomArrayElement(array $arr)
{
    if (!is_array($arr) || empty($arr)) {
        return null;
    }

    $rand_key = array_rand($arr, 1);

    return $arr[$rand_key];
}

function getAnswer(string $question): string
{
    line("Question: %s!", $question);
    return prompt('Your answer');
}

function printCorrect()
{
    line("Correct!");
}

function printWrong($userName, $userAnswer, $correctAnswer)
{
    line("%s is wrong answer ;(. Correct answer was %s.", $userAnswer, $correctAnswer);
    line("Let's try again, %s!", $userName);
}

function congratulate($userName)
{
    line("Congratulations, %s!", $userName);
}