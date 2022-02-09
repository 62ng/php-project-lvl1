<?php

/**
 * Cli functions
 * php version 7.4.0
 *
 * @category None
 * @package  None
 * @author   An <internet.buro@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     None
 **/

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Print Hello msg.
 *
 * @return void
 **/
function sayHello()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
