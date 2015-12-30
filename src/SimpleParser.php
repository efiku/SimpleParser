<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 30.12.15
 * Time: 21:22
 */

namespace efiku;

use efiku\SimpleParser\Exception\FileNotFound;

class SimpleParser implements \Iterator
{
    private $filePointer;
    private $currentElement;
    private $rowCounter;


    public function __construct(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new FileNotFound();
        }
        $this->filePointer = fopen($fileName, "r");
    }

    public function current(): string
    {
        $this->currentElement = trim(fgets($this->filePointer));

        return $this->currentElement;
    }

    public function next()
    {
        ++$this->rowCounter;
    }

    public function key() : int
    {
        return $this->rowCounter;
    }

    public function valid() : bool
    {
        if (feof($this->filePointer)) {
            fclose($this->filePointer);
            return false;
        }
        return true;
    }

    public function rewind()
    {
        $this->rowCounter = 0;
        $this->currentElement = null;
        rewind($this->filePointer);
    }

    public function isEmptyLine() : bool
    {
        return ($this->currentElement === "");
    }
}
