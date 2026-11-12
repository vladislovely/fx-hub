<?php

declare(strict_types=1);

namespace App\Fixture;

final class ClampCaller
{
    public function __construct(private readonly Clamp $clamp)
    {
    }

    public function guarded(int $value): int
    {
        try {
            return $this->clamp->normalize($value, 10, 0);
        } catch (\LogicException) {
            return 0;
        }
    }

    public function plain(int $value): int
    {
        return $this->clamp->normalize($value, 0, 10);
    }
}
