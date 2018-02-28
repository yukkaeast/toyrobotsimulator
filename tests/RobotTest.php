<?php

use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase
{
    /** @var Robot */
    protected $robot;

    /**
     * This method is called before each test.
     */
    public function setUp()
    {
        $this->robot = new Robot();
    }

    /**
     * Test Robot's PLACE function
     */
    public function testPlace()
    {
        // base place
        $this->robot->place(0, 0, 'NORTH');
        $this->assertEquals('Output: 0,0,NORTH', $this->robot->report());
        $this->robot->place(0, 0, 'EAST');
        $this->assertEquals('Output: 0,0,EAST', $this->robot->report());

        // wrong place
        $this->robot->place(0, 6, 'NORTH');
        $this->assertEquals(false, $this->robot->report());
        $this->robot->place(0, -6, 'NORTH');
        $this->assertEquals(false, $this->robot->report());
        $this->robot->place(6, 0, 'NORTH');
        $this->assertEquals(false, $this->robot->report());
        $this->robot->place(-6, 0, 'NORTH');
        $this->assertEquals(false, $this->robot->report());
        $this->robot->place(0, 0, 'TEST');
        $this->assertEquals(false, $this->robot->report());

        // other table cases
        $this->robot->place(2, 2, 'WEST');
        $this->assertEquals('Output: 2,2,WEST', $this->robot->report());
        $this->robot->place(3, 4, 'SOUTH');
        $this->assertEquals('Output: 3,4,SOUTH', $this->robot->report());
        $this->robot->place(4, 0, 'EAST');
        $this->assertEquals('Output: 4,0,EAST', $this->robot->report());
    }

    public function testMove()
    {
    }

    public function testLeft()
    {
    }

    public function testRight()
    {
    }
}