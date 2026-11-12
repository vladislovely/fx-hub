<?php

declare(strict_types=1);

namespace App\Fixture;

final class NewHome
{
    public function other(): string
    {
        return 'other';
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
