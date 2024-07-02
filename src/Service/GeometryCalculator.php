<?php

namespace App\Service;


use App\Domain\Contract\Shape2D;

class GeometryCalculator
{
    public function sumSurfaces(Shape2D $shape1, Shape2D $shape2): float
    {
        return $shape1->calculateSurface() + $shape2->calculateSurface();
    }

    public function sumCircumferences(Shape2D $shape1, Shape2D $shape2): float
    {
        return $shape1->calculateCircumference() + $shape2->calculateCircumference();
    }
}
