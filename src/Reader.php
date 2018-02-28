<?php

/**
 * Class Reader
 */
class Reader
{
    /** @var Robot */
    protected $robot;

    /**
     * Reader constructor.
     * @param string $file Path to file
     */
    public function __construct($file)
    {
        $this->robot = new Robot();
        $oFile = new SplFileObject($file);
        while (!$oFile->eof()) {
            $this->parse(trim($oFile->fgets()));
        }
    }

    /**
     * @param string $line
     */
    public function parse($line) {
        // test if command is valid
        preg_match('/^(PLACE ([\-]{0,1}\d*),([\-]{0,1}\d*),(NORTH|EAST|SOUTH|WEST))$|^MOVE$|^LEFT$|^RIGHT$|^REPORT$/i', $line, $match);
        // if command is valid, call robot action
        if ($match[0]) {
            $tmpMatch = explode(" ", strtoupper($match[0]));
            $command = $tmpMatch[0];
            if ($command=='PLACE') {
                $tmpMatchPlace = explode(",", $tmpMatch[1]);
                $x = $tmpMatchPlace[0];
                $y = $tmpMatchPlace[1];
                $f = $tmpMatchPlace[2];
                unset($tmpMatchPlace);

                call_user_func([$this->robot, $command], $x, $y, $f);
            } else {
                call_user_func([$this->robot, $command]);
            }
            unset($tmpMatch);
        }
    }
}