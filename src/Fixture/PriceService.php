<?php

declare(strict_types=1);

namespace App\Fixture;

final class PriceService
{
    public function __construct(private readonly Clamp $clamp, private readonly Renamer $renamer)
    {
    }

    public function normalize(int $value): int
    {
        return $this->clamp->normalize($value, 0, 100);
    }

    public function delay(int $attempt): int
    {
        return $this->renamer->computeDelaySeconds($attempt, 60);
    }
}
