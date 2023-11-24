<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Robot</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
    require __DIR__ . "/../vendor/autoload.php";

    $decorator = new \App\Service\Decorator\GridDecorator();
    /**
     * The command sequence: "N E S W" will move the robot in a full square, returning it to where it started.
     */
    $robot = \App\Service\RobotFactory::build(0,0);
    $robot->processCommands("N E S W");
    echo "Final Position: " . implode(', ', $robot->getCurrentPosition()) . "\n";
    echo $decorator->displayGridPosition($robot->getCurrentPosition()[0], $robot->getCurrentPosition()[1]);
    echo "<br>";

    /**
     * If the robot starts in the south-west corner of the warehouse then the following commands will move it to the middle of the warehouse.
     * "N E N E N E N E"
     * */
    $robot = \App\Service\RobotFactory::build();
    $robot->processCommands("N E N E N E N E");
    echo "Final Position: " . implode(', ', $robot->getCurrentPosition()) . "\n";
    echo $decorator->displayGridPosition($robot->getCurrentPosition()[0], $robot->getCurrentPosition()[1]);
    echo "<br>";
?>

</body>
</html>