<?php

namespace App\Tests\Functional\Controller;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class ShapeControllerTest extends ApiTestCase
{
    public function testCanCalculateCircleSurfaceAndCircumference(): void
    {
        $radius = 2;

        static::createClient()->request('GET', "/circle/$radius");

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains([
            'type' => 'circle',
            'radius' => 2,
            'surface' => 12.57,
            'circumference' => 12.57,
        ]);
    }

    public function testCanCalculateTriangleSurfaceAndCircumference(): void
    {
        $a = 3;
        $b = 4;
        $c = 5;

        static::createClient()->request('GET', "/triangle/$a/$b/$c");

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains([
            'type' => 'triangle',
            'a' => 3,
            'b' => 4,
            'c' => 5,
            'surface' => 6,
            'circumference' => 12,
        ]);
    }

}
