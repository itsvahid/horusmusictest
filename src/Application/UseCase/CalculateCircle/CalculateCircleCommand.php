<?php

namespace App\Application\UseCase\CalculateCircle;

readonly class CalculateCircleCommand
{
    public function __construct(private float $radius)
    {
    }

    public function getRadius(): float
    {
        return $this->radius;
    }
}
