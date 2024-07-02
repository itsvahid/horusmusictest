<?php

namespace App\Tests\Unit;

use App\Domain\Model\Triangle;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
    public function testCircumferenceCanBeCalculated(): void
    {
        $triangle = new Triangle(3, 4, 5);

        $circumference = $triangle->calculateCircumference();

        $this->assertSame(12.00, (float) number_format($circumference, 2));
    }

    public function testSurfaceCanBeCalculated(): void
    {
        $triangle = new Triangle(3, 4, 5);

        $surface = $triangle->calculateSurface();

        $this->assertSame(6.00, (float) number_format($surface, 2));
    }

    /**
     * @dataProvider nonPositiveSideTriangleDataProvider
     */
    public function testAllSidesArePositiveNumbers(float $a, float $b, float $c): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Triangle($a, $b, $c);
    }

    /**
     * @dataProvider validTriangleDataProvider
     */
    public function testIsValidTriangle(float $a, float $b, float $c, bool $isValid)
    {
        if (false === $isValid) {
            $this->expectException(\InvalidArgumentException::class);
        } else {
            $this->assertTrue(true);
        }
        new Triangle($a, $b, $c);
    }

    public function nonPositiveSideTriangleDataProvider(): array
    {
        return [
            [0, 4, 5],
            [3, 0, 5],
            [3, 4, 0],
        ];
    }

    public function validTriangleDataProvider(): array
    {
        return [
            // Valid triangles
            [3, 4, 5, true],
            [5, 5, 5, true],
            [7, 10, 5, true],

            // Invalid triangles
            [1, 2, 3, false],
            [5, 1, 1, false],
            [0, 0, 0, false],
            [-1, -2, -3, false],

            // Degenerate triangles
            [1, 1, 2, false],
            [2, 3, 5, false],
        ];
    }
}
