<?php

declare(strict_types=1);

namespace App\Fixture;

final class Clamp
{
    public function normalize(int $value, int $min, int $max): int
    {
        if ($value < 0) {
            $value = 0;
        }
        if ($value < $min) {
            $value = $min;
        }
        if ($value > $max) {
            $value = $max;
        }

        return $value;
    }
}
