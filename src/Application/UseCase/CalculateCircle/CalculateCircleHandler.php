<?php

namespace App\Application\UseCase\CalculateCircle;

use App\Domain\Model\Circle;

class CalculateCircleHandler
{
    public function handle(CalculateCircleCommand $command): CalculateCircleResponse
    {
        $circle = new Circle($command->getRadius());

        $surface = number_format($circle->calculateSurface(), 2);
        $circumference = number_format($circle->calculateCircumference(), 2);

        return new CalculateCircleResponse('circle', $command->getRadius(), $surface, $circumference);
    }
}
