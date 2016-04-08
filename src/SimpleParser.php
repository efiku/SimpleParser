<?php
namespace SimpleParser;

use SimpleParser\Exception\FileNotFound;

class SimpleParser implements \Iterator
{
    private $filePointer;
    private $currentElement;
    private $rowCounter;

    public function __construct($fileName)
    {
        if (!file_exists($fileName)) {
            throw new FileNotFound();
        }
        $this->filePointer = fopen($fileName, 'r');
    }

    public function current()
    {
        $this->currentElement = trim(fgets($this->filePointer));

        return $this->currentElement;
    }

    public function next()
    {
        ++$this->rowCounter;
    }

    public function key()
    {
        return $this->rowCounter;
    }

    public function valid()
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

    public function isEmptyLine()
    {
        return $this->currentElement === '';
    }
}
