<?php

namespace Brain\Progression;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\checkRound;
use function Brain\Engine\endGame;
use const Brain\Engine\ROUNDS;

const ESSENCE_PROGRESSION = 'What number is missing in the progression?';

function brainProgression(): void
{
    $userName = startGame(ESSENCE_PROGRESSION);

    for ($i = 0; $i < ROUNDS; $i++) {
        // minimum number of elements in progression
        $pElementsMinNum = 6;
        // maximum number of elements in progression
        $pElementsMaxNum = 12;
        // random number of elements in progression
        $pElementsNum = rand($pElementsMinNum, $pElementsMaxNum);
        // random start number of the first element in progression
        $pStartNum = randomNum();
        // random delta of progression
        $pDelta = randomNum();

        // array with progression elements
        $progression = getProgression($pElementsNum, $pStartNum, $pDelta);
        // random index of missed element in progression array
        $pMissedElementIndex = rand(0, $pElementsNum - 1);
        // missed element of progression
        $correctAnswer = $progression[$pMissedElementIndex];

        $progressionToQuestion = $progression;
        $progressionToQuestion[$pMissedElementIndex] = '..';
        $pQuestionString = implode(' ', $progressionToQuestion);
        $userAnswer = (int) getAnswer($pQuestionString);

        $result = checkRound($userName, $userAnswer, $correctAnswer);
        if (!$result) {
            return;
        }
    }

    endGame($userName);
}

function getProgression(int $elementsNum, int $startNum, int $delta): array
{
    $result = [];
    for (
        $i = 0, $element = $startNum;
        $i < $elementsNum;
        $i++, $element += $delta
    ) {
        $result[] = $element;
    }

    return $result;
}
