<?php

namespace Php\Project\Lvl1\Progression;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\Engine\ROUNDS;

const ESSENCE_PROGRESSION = 'What number is missing in the progression?';

function runGame(): void
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $numOfElementsFrom = 6;
        $numOfElementsTo = 12;
        $numOfElements = rand($numOfElementsFrom, $numOfElementsTo);

        $randomFrom = 1;
        $randomTo = 100;
        $firstElement = rand($randomFrom, $randomTo);
        $delta = rand($randomFrom, $randomTo);

        $progression = getProgression($numOfElements, $firstElement, $delta);

        $missedElement = rand(0, $numOfElements - 1);
        $correctAnswer = (string) $progression[$missedElement];

        $progressionToQuestion = $progression;
        $progressionToQuestion[$missedElement] = '..';
        $progressionQuestionString = implode(' ', $progressionToQuestion);

        $questionsAndAnswers[] = ["{$progressionQuestionString}", $correctAnswer];
    }

    startGame($questionsAndAnswers, ESSENCE_PROGRESSION);
}

function getProgression(int $elementsNum, int $firstElement, int $delta): array
{
    $progression = [];
    for (
        $i = 0, $element = $firstElement;
        $i < $elementsNum;
        $i++, $element += $delta
    ) {
        $progression[] = $element;
    }

    return $progression;
}
