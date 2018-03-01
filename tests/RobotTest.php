<?php
require_once "src/Robot.php";

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
        // base place
        $this->robot->place(0, 0, 'NORTH');
        $this->assertEquals('Output: 0,0,NORTH', $this->robot->report());
        $this->robot->move();
        $this->assertEquals('Output: 0,1,NORTH', $this->robot->report());
        $this->robot->move();
        $this->assertEquals('Output: 0,2,NORTH', $this->robot->report());
        $this->robot->move();
        $this->assertEquals('Output: 0,3,NORTH', $this->robot->report());
        $this->robot->move();
        $this->assertEquals('Output: 0,4,NORTH', $this->robot->report());
        // end of the table
        $this->robot->move();
        $this->assertEquals('Output: 0,4,NORTH', $this->robot->report());
        // east
        $this->robot->place(3, 0, 'EAST');
        $this->assertEquals('Output: 3,0,EAST', $this->robot->report());
        $this->robot->move();
        $this->assertEquals('Output: 4,0,EAST', $this->robot->report());
        // south
        $this->robot->place(3, 4, 'SOUTH');
        $this->assertEquals('Output: 3,4,SOUTH', $this->robot->report());
        $this->robot->move();
        $this->assertEquals('Output: 3,3,SOUTH', $this->robot->report());
        // west
        $this->robot->place(2, 2, 'WEST');
        $this->assertEquals('Output: 2,2,WEST', $this->robot->report());
        $this->robot->move();
        $this->assertEquals('Output: 1,2,WEST', $this->robot->report());

        // wrong place
        $this->robot->place(0, 6, 'NORTH');
        $this->assertEquals(false, $this->robot->report());
        $this->robot->move();
        $this->assertEquals(false, $this->robot->report());
    }

    public function testLeft()
    {
        // base place
        $this->robot->place(0, 0, 'NORTH');
        $this->assertEquals('Output: 0,0,NORTH', $this->robot->report());

        $this->robot->left();
        $this->assertEquals('Output: 0,0,WEST', $this->robot->report());
        $this->robot->left();
        $this->assertEquals('Output: 0,0,SOUTH', $this->robot->report());
        $this->robot->left();
        $this->assertEquals('Output: 0,0,EAST', $this->robot->report());
        $this->robot->left();
        $this->assertEquals('Output: 0,0,NORTH', $this->robot->report());

        // wrong place
        $this->robot->place(0, 6, 'NORTH');
        $this->assertEquals(false, $this->robot->report());
        $this->robot->left();
        $this->assertEquals(false, $this->robot->report());
    }

    public function testRight()
    {
        // base place
        $this->robot->place(0, 0, 'NORTH');
        $this->assertEquals('Output: 0,0,NORTH', $this->robot->report());

        $this->robot->right();
        $this->assertEquals('Output: 0,0,EAST', $this->robot->report());
        $this->robot->right();
        $this->assertEquals('Output: 0,0,SOUTH', $this->robot->report());
        $this->robot->right();
        $this->assertEquals('Output: 0,0,WEST', $this->robot->report());
        $this->robot->right();
        $this->assertEquals('Output: 0,0,NORTH', $this->robot->report());

        // wrong place
        $this->robot->place(0, 6, 'NORTH');
        $this->assertEquals(false, $this->robot->report());
        $this->robot->right();
        $this->assertEquals(false, $this->robot->report());
    }
}