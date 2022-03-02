<?php

namespace Brain\Even;

use function Brain\Engine\startGame;
use function Brain\Engine\randomNum;
use function Brain\Engine\getAnswer;
use function Brain\Engine\checkRound;
use function Brain\Engine\endGame;
use const Brain\Engine\ROUNDS;

const ESSENCE_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function brainEven(): void
{
    $userName = startGame(ESSENCE_EVEN);

    for ($i = 0; $i < ROUNDS; $i++) {
        $randomNum = randomNum();

        $userAnswer = getAnswer("{$randomNum}");
        $correctAnswer = (($randomNum % 2) === 0) ? 'yes' : 'no';

        $result = checkRound($userName, $userAnswer, $correctAnswer);
        if (!$result) {
            return;
        }
    }

    endGame($userName);
}
