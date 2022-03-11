<?php

namespace Php\Project\Lvl1\Progression;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE_PROGRESSION = 'What number is missing in the progression?';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $progressionMinNumOfElements = 6;
        $progressionMaxNumOfElements = 12;
        $progressionNumOfElements = rand(
            $progressionMinNumOfElements,
            $progressionMaxNumOfElements
        );
        $randomFrom = 1;
        $randomTo = 100;
        $progressionFirstElement = rand($randomFrom, $randomTo);
        $progressionDelta = rand($randomFrom, $randomTo);

        $progressionElements = getProgression(
            $progressionNumOfElements,
            $progressionFirstElement,
            $progressionDelta
        );

        $progressionMissedElementIndex = rand(0, $progressionNumOfElements - 1);
        $correctAnswer = (string) $progressionElements[
            $progressionMissedElementIndex
        ];

        $progressionToQuestion = $progressionElements;
        $progressionToQuestion[$progressionMissedElementIndex] = '..';
        $progressionQuestionString = implode(' ', $progressionToQuestion);

        $questionsAndAnswers [] = [
            "{$progressionQuestionString}",
            $correctAnswer
        ];
    }

    startGame($questionsAndAnswers, ESSENCE_PROGRESSION);
}

function getProgression(int $elementsNum, int $firstElement, int $delta): array
{
    $result = [];
    for (
        $i = 0, $element = $firstElement;
        $i < $elementsNum;
        $i++, $element += $delta
    ) {
        $result[] = $element;
    }

    return $result;
}
