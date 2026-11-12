<?php

declare(strict_types=1);

namespace App\Fixture;

final class Pricing
{
    public function total(array $lines, int $percent): int
    {
        $sum = 0;
        foreach ($lines as $line) {
            $sum += $line * $percent;
        }
        if ($sum > 1000) {
            $sum = $sum - 100;
        }

        return $sum;
    }

    public function report(array $lines): string
    {
        $names = [];
        foreach ($lines as $line) {
            $names[] = $this->label($line);
        }

        return implode(', ', $names);
    }

    private function label(int $line): string
    {
        $text = (string) $line;
        $text = str_pad($text, 6, '0', STR_PAD_LEFT);

        return 'line-'.$text;
    }
}
