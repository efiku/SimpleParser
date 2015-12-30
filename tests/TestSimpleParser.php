<?php
use efiku\SimpleParser;

/**
 * Created by PhpStorm.
 * User: efik
 * Date: 30.12.15
 * Time: 21:25
 */
class TestSimpleParser extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException efiku\SimpleParser\Exception\FileNotFound
     * @expectedExceptionMessage File not found!
     */
    public function testException()
    {
        $test = new SimpleParser("");
    }

    public function testgetAllData()
    {
        $polishWords = new SimpleParser("./web/1.txt");

        $testedArray = [];
        foreach ($polishWords as $word) {
            if (!$polishWords->isEmptyLine()) {
                $testedArray[] = $word;
            }
        }
        $this->assertCount(5, $testedArray);
        $this->assertInstanceOf('\Iterator', $polishWords);
    }
}
