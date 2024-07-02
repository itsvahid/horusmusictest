<?php

namespace App\Tests\Integration;

use App\Domain\Model\Circle;
use App\Domain\Model\Triangle;
use App\Service\GeometryCalculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GeometryCalculatorTest extends KernelTestCase
{
    public function testCanSumSurfaceOfSimilarShapes(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        /** @var GeometryCalculator $geometryCalculator */
        $geometryCalculator = static::getContainer()->get('geometry_calculator');

        $circle1 = new Circle(2);
        $circle2 = new Circle(4);

        $surfaceTotal = $geometryCalculator->sumSurfaces($circle1, $circle2);

        $this->assertSame(62.83, (float) number_format($surfaceTotal, 2));
    }

    public function testCanSumSurfaceOfDifferentShapes(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        /** @var GeometryCalculator $geometryCalculator */
        $geometryCalculator = static::getContainer()->get('geometry_calculator');

        $circle = new Circle(2);
        $triangle = new Triangle(3,4,5);

        $surfaceTotal = $geometryCalculator->sumSurfaces($circle, $triangle);

        $this->assertSame(18.57, (float) number_format($surfaceTotal, 2));
    }

    public function testCanSumCircumferenceOfSimilarShapes(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        /** @var GeometryCalculator $geometryCalculator */
        $geometryCalculator = static::getContainer()->get('geometry_calculator');

        $circle1 = new Circle(2);
        $circle2 = new Circle(4);

        $circumferenceTotal = $geometryCalculator->sumCircumferences($circle1, $circle2);

        $this->assertSame(37.70, (float) number_format($circumferenceTotal, 2));
    }

    public function testCanSumCircumferenceOfDifferentShapes(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        /** @var GeometryCalculator $geometryCalculator */
        $geometryCalculator = static::getContainer()->get('geometry_calculator');

        $circle = new Circle(2);
        $triangle = new Triangle(3,4,5);

        $circumferenceTotal = $geometryCalculator->sumCircumferences($circle, $triangle);

        $this->assertSame(24.57, (float) number_format($circumferenceTotal, 2));
    }

}
