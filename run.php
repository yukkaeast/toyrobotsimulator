<?php
include 'src/Reader.php';
include 'src/Robot.php';

if ($argv[1] && is_file($argv[1]) && is_readable($argv[1])) {
    echo (new Reader($argv[1]))->report();
} else {
    echo "Error: please check path to file" . PHP_EOL;
}