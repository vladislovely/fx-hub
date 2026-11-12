<?php

declare(strict_types=1);

namespace App\Fixture\Http;

use App\Fixture\PriceService;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/prices', name: 'prices_')]
final class PriceController
{
    public function __construct(private readonly PriceService $prices)
    {
    }

    #[Route('/{id}/clamp', name: 'clamp', methods: ['POST'])]
    public function clamp(int $id): int
    {
        return $this->prices->normalize($id);
    }

    #[Route(self::DELAY, name: 'delay')]
    public function delay(int $attempt): int
    {
        return $this->prices->delay($attempt);
    }

    private const DELAY = '/delay';
}
