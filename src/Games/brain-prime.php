<?php

/**
 * Brain Prime game
 * php version 7.4.0
 *
 * @category None
 * @package  None
 * @author   An <internet.buro@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     None
 **/

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Brain\Games\Engine\printGameEssence;
use function Brain\Games\Engine\getName;
use function Brain\Games\Engine\randomNum;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\printCorrect;
use function Brain\Games\Engine\printWrong;
use function Brain\Games\Engine\congratulate;

$userName = getName();
printGameEssence('Answer "yes" if given number is prime. Otherwise answer "no".');

for ($i = 0; $i < 3; $i++) {
    $randomNum = randomNum();

    $userAnswer = getAnswer("{$randomNum}");
    if (in_array($randomNum, [2, 3, 5, 7])) {
        $correctAnswer = 'yes';
    } elseif (
        ($randomNum % 2) == 0 ||
        ($randomNum % 3) == 0 ||
        ($randomNum % 5) == 0 ||
        ($randomNum % 7) == 0
    ) {
        $correctAnswer = 'no';
    } else {
        $correctAnswer = 'yes';
    }

    if ($userAnswer === $correctAnswer) {
        printCorrect();
    } else {
        printWrong($userName, $userAnswer, $correctAnswer);
        exit;
    }
}

congratulate($userName);
