<?php

/**
 * Brain Prime game functions
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

/**
 * Brain Prime game
 *
 * @return void
 **/
function brainPrime()
{
    $userName = getName();
    printGameEssence(
        'Answer "yes" if given number is prime. Otherwise answer "no".'
    );

    for ($i = 0; $i < 3; $i++) {
        $randomNum = randomNum();

        $userAnswer = getAnswer("{$randomNum}");
        $correctAnswer = ifPrime($randomNum) ? 'yes' : 'no';
    
        if ($userAnswer === $correctAnswer) {
            printCorrect();
        } else {
            printWrong($userName, $userAnswer, $correctAnswer);
            exit;
        }
    }

    congratulate($userName);
}

/**
 * Determine if number is prime
 *
 * @param int $num number
 *
 * @return bool
 **/
function ifPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
