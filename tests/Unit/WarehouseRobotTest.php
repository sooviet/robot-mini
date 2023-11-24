<?php

namespace Tests\Unit;

use App\Service\Robot\Exceptions\InvalidCommandException;
use App\Service\Robot\WarehouseRobot;
use PHPUnit\Framework\TestCase;

class WarehouseRobotTest extends TestCase
{
    public function testInitialPosition(): void
    {
        $robot = new WarehouseRobot();
        $this->assertEquals([0, 0], $robot->getCurrentPosition());
    }

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

    public function testMoveNorth(): void
    {
        $robot = new WarehouseRobot();
        $robot->processCommands('N');
        $this->assertEquals([0, 1], $robot->getCurrentPosition());
    }

    public function testMoveSouth(): void
    {
        $robot = new WarehouseRobot();
        $robot->processCommands('S');
        $this->assertEquals([0, 0], $robot->getCurrentPosition());
    }

    public function testMoveEast(): void
    {
        $robot = new WarehouseRobot();
        $robot->processCommands('E');
        $this->assertEquals([1, 0], $robot->getCurrentPosition());
    }

    public function testMoveWest(): void
    {
        $robot = new WarehouseRobot(2, 2);
        $robot->processCommands('W');
        $this->assertEquals([1, 2], $robot->getCurrentPosition());
    }

    public function testInvalidCommand(): void
    {
        $this->expectException(InvalidCommandException::class);
        $robot = new WarehouseRobot();
        $robot->processCommands('A');
    }

    public function testMoveOutsideGrid(): void
    {
        $robot = new WarehouseRobot(9, 9);
        $robot->processCommands('N'); // Trying to move north from the top should not exceed the grid
        $this->assertEquals([9, 9], $robot->getCurrentPosition());
    }
}