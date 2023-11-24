<?php

namespace App\Service\Robot;

interface RobotInterface
{
    public function processCommands(string $commands): void;
    public function getCurrentPosition(): array;
}