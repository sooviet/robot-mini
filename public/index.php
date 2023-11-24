<?php

require __DIR__ . "/../vendor/autoload.php";

$robot = \App\Service\RobotFactory::build();
$robot->processCommands("N E S W");
echo "Final Position: " . implode(', ', $robot->getCurrentPosition()) . "\n";
echo "<br>";

$robot = \App\Service\RobotFactory::build();
$robot->processCommands("N E N E N E N E");
echo "Final Position: " . implode(', ', $robot->getCurrentPosition()) . "\n";
echo "<br>";
