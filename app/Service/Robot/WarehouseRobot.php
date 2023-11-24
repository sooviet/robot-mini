<?php

namespace App\Service\Robot;

use App\Service\Robot\Exceptions\InvalidCommandException;

class WarehouseRobot implements RobotInterface
{
    const GRID_SIZE = 10;
    private int $xPosition;
    private int $yPosition;

    public function __construct(int $xPosition = 0, int $yPosition = 0)
    {
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
    }

    /**
     * @throws InvalidCommandException
     */
    public function processCommands(string $commands): void
    {
        $commandList = explode(" ", $commands);

        # Execute sequence of commands
        foreach ($commandList as $command) {
            $this->executeCommand($command);
        }
    }

    private function executeCommand(string $command): void
    {
        switch ($command) {
            case 'N':
                $this->moveNorth();
                break;
            case 'S':
                $this->moveSouth();
                break;
            case 'E':
                $this->moveEast();
                break;
            case 'W':
                $this->moveWest();
                break;
            default:
                throw new InvalidCommandException(
                    sprintf("You have entered a wrong command sequence- '%s'. Please correct the command & try again!",
                        $command
                    )
                );
        }

        $this->validatePosition();
    }

    private function moveNorth(): void
    {
        $this->yPosition = min(self::GRID_SIZE - 1, $this->yPosition + 1);
    }

    private function moveSouth(): void
    {
        $this->yPosition = max(0, $this->yPosition - 1);
    }

    private function moveEast(): void
    {
        $this->xPosition = min(self::GRID_SIZE - 1, $this->xPosition + 1);
    }

    private function moveWest(): void
    {
        $this->xPosition = max(0, $this->xPosition - 1);
    }

    private function validatePosition(): void
    {
        $this->xPosition = max(0, min(self::GRID_SIZE - 1, $this->xPosition));
        $this->yPosition = max(0, min(self::GRID_SIZE - 1, $this->yPosition));
    }

    public function getCurrentPosition(): array
    {
        return [$this->xPosition, $this->yPosition];
    }
}