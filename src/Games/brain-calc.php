<?php

/**
 * Brain Calc game functions
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
 * Calc expression
 *
 * @param string $operation One of the arithmetic operation type (+, -, *)
 * @param int    $num1      1-st number
 * @param int    $num2      2-nd number
 *
 * @return int
 **/
function calc(string $operation, int $num1, int $num2): int
{
    $result = eval("return {$num1} {$operation} {$num2};");

    return $result;
}
