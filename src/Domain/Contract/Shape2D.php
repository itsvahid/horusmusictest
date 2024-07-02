<?php

namespace App\Domain\Contract;

interface Shape2D
{
    public function getType(): string;

    public function calculateSurface(): float;

    public function calculateCircumference(): float;
}
