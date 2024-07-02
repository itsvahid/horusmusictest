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

}
