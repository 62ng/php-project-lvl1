<?php

/**
 * Brain Progression game
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
use function Brain\Games\Engine\randomArrayElement;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\printCorrect;
use function Brain\Games\Engine\printWrong;
use function Brain\Games\Engine\congratulate;

$userName = getName();
printGameEssence('What number is missing in the progression?');

for ($i = 0; $i < 3; $i++) {
    // minimum number of elements in progression
    $pElementsMinNum = 6;
    // maximum number of elements in progression
    $pElementsMaxNum = 12;
    // random number of elements in progression
    $pElementsNum = rand($pElementsMinNum, $pElementsMaxNum);
    // random start number of the first element in progression
    $pStartNum = randomNum();
    // random delta in progression
    $pDelta = randomNum();

    // array with progression elements
    $pQuestion = [];
    // missed element of progression
    $correctMissedElement = 0;
    // random index of missed element in progression array
    $pMissedElementIndex = rand(2, $pElementsNum);
    for (
        $p = 1, $pCurrentElement = $pStartNum;
        $p <= $pElementsNum;
        $p++, $pCurrentElement += $pDelta
    ) {
        if ($p == $pMissedElementIndex) {
            $pQuestion[] = "..";
            $correctMissedElement = $pCurrentElement;
        } else {
            $pQuestion[] = "{$pCurrentElement}";
        }
    }

    $pQuestionString = implode(' ', $pQuestion);
    $userMissedElement = getAnswer($pQuestionString);

    if ((int) $userMissedElement == (int) $correctMissedElement) {
        printCorrect();
    } else {
        printWrong($userName, $userMissedElement, $correctMissedElement);
        exit;
    }
}

congratulate($userName);
