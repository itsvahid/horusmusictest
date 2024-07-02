<?php

namespace App\Application\UseCase\CalculateCircle;

readonly class CalculateCircleResponse
{
    public function __construct(private string $type, private float $radius, private float $surface, private float $circumference)
    {
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'radius' => $this->radius,
            'surface' => $this->surface,
            'circumference' => $this->circumference,
        ];
    }
}
