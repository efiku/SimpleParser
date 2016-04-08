<?php

namespace SimpleParser\Exception;

use Exception;

class FileNotFound extends Exception
{
    public function __construct()
    {
        parent::__construct("File not found!");
    }
}
