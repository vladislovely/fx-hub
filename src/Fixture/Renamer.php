<?php

declare(strict_types=1);

namespace App\Fixture;

final class Renamer
{
    public function computeBackoff(int $attempt, int $cap): int
    {
        $wait = 50;
        for ($i = 0; $i < $attempt; ++$i) {
            $wait = min($cap, $wait * 3);
        }

        return $wait;
    }
}
