<?php

namespace App\Application\UseCase\CalculateTriangle;

readonly class CalculateTriangleCommand
{
    public function __construct(private float $a, private float $b, private float $c)
    {
    }

    public function getA(): float
    {
        return $this->a;
    }

    public function getB(): float
    {
        return $this->b;
    }

    public function getC(): float
    {
        return $this->c;
    }
}
