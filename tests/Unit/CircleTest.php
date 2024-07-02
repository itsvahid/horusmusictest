<?php

namespace App\Tests\Unit;

use App\Domain\Model\Circle;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    public function testCircumferenceCanBeCalculated(): void
    {
        $circle = new Circle(2);

        $circumference = $circle->calculateCircumference();

        $this->assertSame(12.57, (float) number_format($circumference, 2));
    }

    public function testSurfaceCanBeCalculated(): void
    {
        $circle = new Circle(2);

        $surface = $circle->calculateSurface();

        $this->assertSame(12.57, (float) number_format($surface, 2));
    }

    public function testRadiusMustBePositive(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Circle(0);
    }
}
