<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 30.12.15
 * Time: 21:33
 */

namespace efiku\SimpleParser\Exception;

use Exception;

class FileNotFound extends Exception
{
    public function __construct()
    {
        parent::__construct("File not found!");
    }
}
