<?php

declare(strict_types=1);

namespace App\Fixture\Http;

use App\Fixture\ClampCaller;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/clamp', name: 'api_clamp_')]
final class ClampApiController
{
    public function __construct(private readonly ClampCaller $clamp)
    {
    }

    #[Route('/plain/{value}', name: 'plain', methods: ['POST'])]
    public function plain(int $value): int
    {
        return $this->clamp->plain($value);
    }

    #[Route('/guarded/{value}', name: 'guarded', methods: ['POST'])]
    public function guarded(int $value): int
    {
        return $this->clamp->guarded($value);
    }
}
