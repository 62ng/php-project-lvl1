<?php

namespace Php\Project\Lvl1\Progression;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE_PROGRESSION = 'What number is missing in the progression?';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        // minimum number of elements in progression
        $pElementsMinNum = 6;
        // maximum number of elements in progression
        $pElementsMaxNum = 12;
        // random number of elements in progression
        $pElementsNum = rand($pElementsMinNum, $pElementsMaxNum);
        // random start number of the first element in progression
        $pStartNum = rand(1, 50);
        // random delta of progression
        $pDelta = rand(1, 10);

        // array with progression elements
        $progression = getProgression($pElementsNum, $pStartNum, $pDelta);
        // random index of missed element in progression array
        $pMissedElementIndex = rand(0, $pElementsNum - 1);
        // missed element of progression
        $correctAnswer = (string) $progression[$pMissedElementIndex];

        $progressionToQuestion = $progression;
        $progressionToQuestion[$pMissedElementIndex] = '..';
        $pQuestionString = implode(' ', $progressionToQuestion);

        $questionsAndAnswers [] = [
            "{$pQuestionString}",
            $correctAnswer
        ];
    }

    startGame($questionsAndAnswers, ESSENCE_PROGRESSION);
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
