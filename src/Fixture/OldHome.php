<?php

declare(strict_types=1);

namespace App\Fixture;

final class OldHome
{
    public function keep(): string
    {
        return 'keep';
    }

    public function calculateDelay(int $attempt): int
    {
        $base = 100;
        $delay = $base * (2 ** $attempt);
        if ($delay > 5000) {
            $delay = 5000;
        }

        return $delay;
    }
}
