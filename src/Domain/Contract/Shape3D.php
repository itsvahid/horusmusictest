<?php

namespace App\Domain\Contract;

interface Shape3D
{
    public function getType(): string;

    public function calculateSurface(): float;

    public function calculateCircumference(): float;

    public function calculateVolume(): float;
}
