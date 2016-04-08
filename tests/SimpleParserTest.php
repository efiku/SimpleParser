<?php
namespace SimpleParser\tests;

use SimpleParser\SimpleParser;

class SimpleParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \SimpleParser\Exception\FileNotFound
     * @expectedExceptionMessage File not found!
     */
    public function testException()
    {
        $test = new SimpleParser("");
    }

    public function testGetAllData()
    {
        $polishWords = new SimpleParser("./web/1.txt");
        $words = file('./web/1.txt');
        foreach ($polishWords as $key => $word) {
            if (!$polishWords->isEmptyLine()) {
                $this->assertSame(trim($words[$key]), $word);
            }
        }
        $this->assertInstanceOf('\Iterator', $polishWords);
    }
}
