<?php
require_once "src/Reader.php";

use PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    /**
     * Test Tasks' Samples
     */
    public function testSamples()
    {
        $this->assertEquals('Output: 0,1,NORTH' . PHP_EOL, (new Reader('samples/sample_a.txt'))->report());
        $this->assertEquals('Output: 0,0,WEST' . PHP_EOL, (new Reader('samples/sample_b.txt'))->report());
        $this->assertEquals('Output: 3,3,NORTH' . PHP_EOL, (new Reader('samples/sample_c.txt'))->report());
    }
}