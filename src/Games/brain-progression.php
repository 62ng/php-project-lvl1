<?php

/**
 * Brain Progression game functions
 * php version 7.4.0
 *
 * @category None
 * @package  None
 * @author   An <internet.buro@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     None
 **/

namespace Brain\Games;

/**
 * Generate progression
 *
 * @param int $elementsNum number of elements in progression
 * @param int $startNum    1-st element
 * @param int $delta       delta between elements
 *
 * @return array
 **/
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
