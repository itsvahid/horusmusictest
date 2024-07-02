<?php

namespace App\Application\UseCase\CalculateTriangle;

readonly class CalculateTriangleResponse
{
    public function __construct(private string $type, private float $a, private float $b, private float $c, private float $surface, private float $circumference)
    {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
            'surface' => $this->surface,
            'circumference' => $this->circumference,
        ];
    }
}
