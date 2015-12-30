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
    /**
     * Resource file pointer
     * @var Resource
     */
    private $filePointer;
    /**
     * Represents current element in iteration
     * @var array
     */
    private $currentElement;
    /**
     * Cumulative row count of file
     * @var int
     */
    private $rowCounter;


    public function __construct(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new FileNotFound();
        }
        $this->filePointer = fopen($fileName, "r");
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current(): string
    {
        $this->currentElement = trim(fgets($this->filePointer));

        return $this->currentElement;
    }

    /**
     * Move forward to next element
     * @since 5.0.0
     */
    public function next()
    {
        ++$this->rowCounter;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key() : int
    {
        return $this->rowCounter;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return false|true
     */
    public function valid() : bool
    {
        if (feof($this->filePointer)) {
            fclose($this->filePointer);
            return false;
        }
        return true;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @since 5.0.0
     */
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
