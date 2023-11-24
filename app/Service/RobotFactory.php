<?php

namespace App\Service;

use App\Service\Robot\RobotInterface;
use App\Service\Robot\WarehouseRobot;

class RobotFactory
{
    public static function build(int $x = 0, int $y = 0): RobotInterface
    {
        return new WarehouseRobot($x, $y);
    }
}