<?php

declare(strict_types=1);

namespace App\Fixture;

final class Pricing
{
    public function total(array $lines, int $percent): int
    {
        return $this->applyDiscount($lines, $percent);
    }

    public function report(array $lines): string
    {
        $names = [];
        foreach ($lines as $line) {
            $text = (string) $line;
            $text = str_pad($text, 6, '0', STR_PAD_LEFT);
            $names[] = 'line-'.$text;
        }

        return implode(', ', $names);
    }

    private function applyDiscount(array $items, int $rate): int
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item * $rate;
        }
        if ($total > 1000) {
            $total = $total - 100;
        }

        return $total;
    }
}
