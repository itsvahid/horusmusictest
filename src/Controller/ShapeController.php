<?php

namespace App\Controller;

use App\Application\UseCase\CalculateCircle\CalculateCircleCommand;
use App\Application\UseCase\CalculateCircle\CalculateCircleHandler;
use App\Application\UseCase\CalculateTriangle\CalculateTriangleCommand;
use App\Application\UseCase\CalculateTriangle\CalculateTriangleHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ShapeController extends AbstractController
{
    public function __construct(
        private readonly CalculateCircleHandler $calculateCircleHandler,
        private readonly CalculateTriangleHandler $calculateTriangleHandler,
    ) {
    }

    #[Route('/circle/{radius}', name: 'app_circle', methods: ['GET'])]
    public function circle(float $radius): JsonResponse
    {
        $response = $this->calculateCircleHandler->handle(new CalculateCircleCommand($radius));

        return $this->json($response->toArray());
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'app_triangle', methods: ['GET'])]
    public function triangle(float $a, float $b, float $c): JsonResponse
    {
        $response = $this->calculateTriangleHandler->handle(new CalculateTriangleCommand($a, $b, $c));

        return $this->json($response->toArray());
    }
}
