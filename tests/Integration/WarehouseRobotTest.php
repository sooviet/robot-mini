<?php

namespace Tests\Integration;

use App\Service\Robot\Exceptions\InvalidCommandException;
use App\Service\Robot\WarehouseRobot;
use PHPUnit\Framework\TestCase;

class WarehouseRobotTest extends TestCase
{
    public function testProcessCommands(): void
    {
        $robot = new WarehouseRobot();

        // Test a sequence of commands
        $robot->processCommands('N E S W');
        $this->assertEquals([0, 0], $robot->getCurrentPosition());

        // Test another sequence of commands
        $robot->processCommands('N E N E N E N E');
        $this->assertEquals([4, 4], $robot->getCurrentPosition());

        // Test an invalid command within the sequence
        $this->expectException(InvalidCommandException::class);
        $robot->processCommands('N X S');
    }
}