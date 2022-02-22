<?php

/**
 * Brain Even game functions
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

define('ESSENCE_EVEN', 'Answer "yes" if the number is even, otherwise answer "no".');

/**
 * Brain Even game
 *
 * @return void
 **/
function brainEven()
{
    $userName = getName();
    printGameEssence(ESSENCE_EVEN);

    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum = randomNum();

        $userAnswer = getAnswer("{$randomNum}");
        $correctAnswer = (($randomNum % 2) === 0) ? 'yes' : 'no';

        if ($userAnswer === $correctAnswer) {
            printCorrect();
        } else {
            printWrong($userName, $userAnswer, $correctAnswer);
            exit;
        }
    }

    congratulate($userName);
}
