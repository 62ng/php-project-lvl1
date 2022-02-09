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

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * Print the Essence of the game.
 *
 * @param string $essence The Essence of the game to print.
 *
 * @return void
 **/
function printGameEssence($essence)
{
    line($essence);
}

/**
 * Get the name of the gamer.
 *
 * @return string
 **/
function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

/**
 * Get the random num.
 *
 * @return int
 **/
function randomNum(): int
{
    $startRange = 1;
    $endRange = 100;

    return rand($startRange, $endRange);
}

/**
 * Get the answer of gamer.
 *
 * @param string $question Question text.
 *
 * @return string
 **/
function getAnswer(string $question): string
{
    line("Question: %s", $question);
    return prompt('Your answer');
}

/**
 * Print msg if answer was correct.
 *
 * @return void
 **/
function printCorrect()
{
    line("Correct!");
}

/**
 * Print msg if answer was wrong.
 *
 * @param string $userName      Gamer's name.
 * @param mixed  $userAnswer    Gamer's answer.
 * @param mixed  $correctAnswer Correct answer.
 *
 * @return void
 **/
function printWrong($userName, $userAnswer, $correctAnswer)
{
    line(
        "'%s' is wrong answer ;(. Correct answer was '%s'.",
        $userAnswer,
        $correctAnswer
    );
    line("Let's try again, %s!", $userName);
}

/**
 * Congratulate if the game is won.
 *
 * @param string $userName Gamer's name.
 *
 * @return void
 **/
function congratulate($userName)
{
    line("Congratulations, %s!", $userName);
}
