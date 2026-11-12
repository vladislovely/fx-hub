<?php

declare(strict_types=1);

namespace App\Fixture;

final class Clamp
{
    public function normalize(int $value, int $min, int $max): int
    {
        if ($min > $max) {
            throw new \InvalidArgumentException('min is above max');
        }
        $value = max($value, 0);
        if ($value < $min) {
            $value = $min;
        }
        if ($value > $max) {
            $value = $max;
        }

        return $value;
    }
}
