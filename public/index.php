<?php

require __DIR__ . "/../vendor/autoload.php";

/**
 * The command sequence: "N E S W" will move the robot in a full square, returning it to where it started.
 */
$robot = \App\Service\RobotFactory::build();
$robot->processCommands("N E S W");
echo "Final Position: " . implode(', ', $robot->getCurrentPosition()) . "\n";
echo "<br>";

/**
 * If the robot starts in the south-west corner of the warehouse then the following commands will move it to the middle of the warehouse.
 * "N E N E N E N E"
 * */
$robot = \App\Service\RobotFactory::build();
$robot->processCommands("N E N E N E N E");
echo "Final Position: " . implode(', ', $robot->getCurrentPosition()) . "\n";
echo "<br>";
