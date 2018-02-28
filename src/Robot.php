<?php

/**
 * Class Robot
 */
class Robot
{
    /** @var int */
    protected $tableSize = 5;
    /** @var array */
    protected $cardinalDirections = ['NORTH', 'EAST', 'SOUTH', 'WEST'];

    /** @var  int */
    protected $x;
    /** @var  int */
    protected $y;
    /** @var  string */
    protected $f;
    /** @var bool */
    protected $isPlaced;

    /**
     * Robot constructor.
     */
    public function __construct()
    {
        $this->isPlaced = false;
    }

    /**
     * PLACE will put the toy robot on the table in position X,Y and facing NORTH, SOUTH, EAST or WEST.
     * @param int $x
     * @param int $y
     * @param string $f 'NORTH', 'EAST', 'SOUTH' or 'WEST'
     * @return void
     */
    public function place($x, $y, $f)
    {
        if ($this->isValidPosition($x, $y)) {
            $this->x = $x;
            $this->y = $y;
            $this->f = $f;
            $this->isPlaced = true;
        } else {
            $this->isPlaced = false;
            $this->error();
        }
    }

    /**
     * MOVE will move the toy robot one unit forward in the direction it is currently facing
     * @return void
     */
    public function move()
    {
        if ($this->isPlaced) {
            $tmpX = $this->x;
            $tmpY = $this->y;
            switch ($this->f) {
                case 'NORTH':
                    $tmpY++;
                    break;
                case 'EAST':
                    $tmpX++;
                    break;
                case 'SOUTH':
                    $tmpY--;
                    break;
                case 'WEST':
                    $tmpX--;
                    break;
            }

            if ($this->isValidPosition($tmpX, $tmpY)) {
                $this->x = $tmpX;
                $this->y = $tmpY;
                unset($tmpX);
                unset($tmpY);
            }
        } else {
            $this->error();
        }
    }

    /**
     * LEFT will rotate the robot 90 degrees in the specified direction without changing the position of the robot
     * @return void
     */
    public function left()
    {
        if ($this->isPlaced) {
            $key = array_search($this->f, $this->cardinalDirections);
            if ($key === 0) {
                $key = 3;
            } else {
                $key--;
            }
            $this->f = $this->cardinalDirections[$key];
        } else {
            $this->error();
        }
    }

    /**
     * RIGHT will rotate the robot 90 degrees in the specified direction without changing the position of the robot
     * @return void
     */
    public function right()
    {
        if ($this->isPlaced) {
            $key = array_search($this->f, $this->cardinalDirections);
            if ($key === 3) {
                $key = 0;
            } else {
                $key++;
            }
            $this->f = $this->cardinalDirections[$key];
        } else {
            $this->error();
        }
    }

    /**
     * REPORT will announce the X,Y and F of the robot
     * @return void
     */
    public function report()
    {
        if ($this->isPlaced) {
            echo 'Output: ' . $this->x . ',' . $this->y . ',' . $this->f . PHP_EOL;
        }
    }

    /**
     * Printing error
     * @return void
     */
    public function error()
    {
        // The application should discard all commands in the sequence until a valid PLACE command has been executed.
        // The task doesn't specify what to do here. Thus, just ignore this.
        if (!$this->isPlaced) {
            //echo 'Error: Robot is not placed on the table' . PHP_EOL;
        }
    }

    /**
     * Check if Position is on the table
     * @param int $x
     * @param int $y
     * @return bool
     */
    public function isValidPosition($x, $y)
    {
        $bValid = true;
        if ($x < 0 || $x > $this->tableSize - 1) {
            $bValid = false;
        }
        if ($y < 0 || $y > $this->tableSize - 1) {
            $bValid = false;
        }
        return $bValid;
    }
}