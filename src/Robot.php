<?php

class Robot
{
    protected $tableSize = 5;

    protected $x;
    protected $y;
    protected $f;
    protected $isPlaced;

    public function __construct()
    {
        $this->isPlaced = false;
    }

    public function place($x, $y, $f)
    {
        if ($this->isValidPosition($x, $y)) {
            $this->x = $x;
            $this->y = $y;
            $this->f = $f;
            $this->isPlaced = true;
            $this->report();
        } else {
            $this->reportError();
        }
    }

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

            $this->report();
        } else {
            $this->reportError();
        }
    }

    public function left()
    {
        if ($this->isPlaced) {
            $this->report();
        } else {
            $this->reportError();
        }
    }

    public function right()
    {
        if ($this->isPlaced) {
            $this->report();
        } else {
            $this->reportError();
        }
    }

    public function report()
    {
        var_dump('Output: ' . $this->x . ',' . $this->y . ',' . $this->f . PHP_EOL);
    }

    public function reportError()
    {
        if (!$this->isPlaced) {
            echo "Error: Robot is not placed on the table";
        }
    }

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