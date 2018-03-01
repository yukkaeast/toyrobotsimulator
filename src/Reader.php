<?php

/**
 * Class Reader
 */
class Reader
{
    /** @var Robot */
    protected $robot;

    /** @var string*/
    protected $report;

    /**
     * Reader constructor.
     * @param string $file Path to file
     */
    public function __construct($file)
    {
        $this->report = '';
        $this->robot = new Robot();
        $oFile = new SplFileObject($file);
        while (!$oFile->eof()) {
            $this->report .= $this->parse(trim($oFile->fgets()));
        }
    }

    /**
     * @param string $line
     */
    public function parse($line)
    {
        $report = "";
        // test if command is valid
        preg_match('/^(PLACE ([\-]{0,1}\d*),([\-]{0,1}\d*),(NORTH|EAST|SOUTH|WEST))$|^MOVE$|^LEFT$|^RIGHT$|^REPORT$/i', $line, $match);
        // if command is valid, call robot action
        if ($match[0]) {
            $tmpMatch = explode(" ", strtoupper($match[0]));
            $command = $tmpMatch[0];
            if ($command == 'PLACE') {
                $tmpMatchPlace = explode(",", $tmpMatch[1]);
                $x = $tmpMatchPlace[0];
                $y = $tmpMatchPlace[1];
                $f = $tmpMatchPlace[2];
                unset($tmpMatchPlace);

                call_user_func([$this->robot, $command], $x, $y, $f);
            } elseif ($command == 'REPORT') {
                $report = call_user_func([$this->robot, $command]) . PHP_EOL;
            } else {
                call_user_func([$this->robot, $command]);
            }
            unset($tmpMatch);
        }
        return $report;
    }

    /**
     * Returns all reports
     * @return void
     */
    public function report()
    {
        return $this->report;
    }

}