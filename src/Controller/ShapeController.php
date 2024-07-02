<?php

namespace App\Controller;

use App\Application\UseCase\CalculateCircle\CalculateCircleCommand;
use App\Application\UseCase\CalculateCircle\CalculateCircleHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ShapeController extends AbstractController
{
    public function __construct(
        private readonly CalculateCircleHandler $calculateCircleHandler,
    ) {
    }

    #[Route('/circle/{radius}', name: 'app_circle', methods: ['GET'])]
    public function circle(float $radius): JsonResponse
    {
        $response = $this->calculateCircleHandler->handle(new CalculateCircleCommand($radius));

        return $this->json($response->toArray());
    }

}
