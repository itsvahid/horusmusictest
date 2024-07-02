<?php

namespace App\Application\UseCase\CalculateTriangle;

use App\Domain\Model\Triangle;

class CalculateTriangleHandler
{
    public function handle(CalculateTriangleCommand $command): CalculateTriangleResponse
    {
        $triangle = new Triangle($command->getA(), $command->getB(), $command->getC());
        $surface = $triangle->calculateSurface();
        $circumference = $triangle->calculateCircumference();

        return new CalculateTriangleResponse('triangle', $command->getA(), $command->getB(), $command->getC(), $surface, $circumference);
    }
}
