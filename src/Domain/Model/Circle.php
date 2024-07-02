<?php

namespace App\Domain\Model;

use App\Domain\Contract\Shape2D;

class Circle implements Shape2D
{
    private const TYPE = 'circle';

    public function __construct(private readonly float $radius)
    {
        if ($this->radius <= 0) {
            throw new \InvalidArgumentException('Radius must be a positive number');
        }
    }

    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function calculateCircumference(): float
    {
        return 2 * pi() * $this->radius;
    }

    public function getType(): string
    {
        return self::TYPE;
    }
}