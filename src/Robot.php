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
        $this->x = $x;
        $this->y = $y;
        $this->f = $f;
        $this->isPlaced = true;
    }

    public function move()
    {
        if ($this->isPlaced) {

        }
    }

    public function left()
    {
        if ($this->isPlaced) {

        }
    }

    public function right()
    {
        if ($this->isPlaced) {

        }
    }

    public function report()
    {
    }
}