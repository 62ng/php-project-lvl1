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

/**
 * Determine if value is even
 *
 * @param int $num number to determine
 *
 * @return bool
 **/
function ifEven(int $num): bool
{
    $result = (($num % 2) === 0) ? true : false;

    return $result;
}
