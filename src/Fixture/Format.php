<?php

declare(strict_types=1);

namespace App\Fixture;

final class Format
{
    public function total(array $items): int
    {
        $sum = 0;
        foreach ($items as $item) {
            $sum += $item;
        }

        return $sum;
    }
}
