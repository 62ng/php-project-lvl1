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

/**
 * Determine if number is prime
 *
 * @param int $num number
 *
 * @return bool
 **/
function ifPrime(int $num): bool
{
    $deviders = [2, 3, 5, 7];
    if (in_array($num, $deviders, true)) {
        $result = true;
    } elseif (
        ($num % 2) == 0 ||
        ($num % 3) == 0 ||
        ($num % 5) == 0 ||
        ($num % 7) == 0
    ) {
        $result = false;
    } else {
        $result = true;
    }

    return $result;
}
