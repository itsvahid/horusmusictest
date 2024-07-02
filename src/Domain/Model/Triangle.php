<?php

namespace App\Domain\Model;

use App\Domain\Contract\Shape2D;

class Triangle implements Shape2D
{
    private const TYPE = 'triangle';

    public function __construct(private int $a, private int $b, private int $c)
    {
        if ($a <= 0 || $b <= 0 || $c <= 0) {
            throw new \InvalidArgumentException('All side values must be positive numbers');
        }
        if (($a + $b <= $c) || ($a + $c <= $b) || ($b + $c <= $a)) {
            throw new \InvalidArgumentException('Invalid triangle');
        }
    }

    public function calculateSurface(): float
    {
        // Using Heron's formula
        $s = $this->calculateCircumference() / 2;

        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function calculateCircumference(): float
    {
        return $this->a + $this->b + $this->c;
    }

    public function getType(): string
    {
        return self::TYPE;
    }
}
