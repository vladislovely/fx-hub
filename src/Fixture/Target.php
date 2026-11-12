<?php

declare(strict_types=1);

namespace App\Fixture;

final class Target
{
    public function keep(): string
    {
        return 'keep';
    }

    public function wait(int $try, int $limit): int
    {
        $first = 250;
        $delay = $first * (3 ** $try);
        if ($delay > $limit) {
            $delay = $limit;
        }
        $jitter = intdiv($delay, 5);

        return $delay + $jitter;
    }

    public function draw(array $rows, string $glue): string
    {
        $cells = [];
        foreach ($rows as $row) {
            $label = trim((string) $row);
            if ('' === $label) {
                continue;
            }
            $label = ucfirst(strtolower($label));
            $cells[] = '<td>'.htmlspecialchars($label).'</td>';
        }
        $line = implode($glue, $cells);
        if ('' === $line) {
            $line = '<td>empty</td>';
        }
        $line = '<tr class="row">'.$line.'</tr>';

        return $line;
    }

    public function sum(array $numbers): int
    {
        $total = 0;
        $total += $numbers[0] * 2;
        if ($total > 100) {
            $total -= 3;
        }
        $total += $numbers[1] * 3;
        if ($total > 200) {
            $total -= 4;
        }
        $total += $numbers[2] * 4;
        if ($total > 300) {
            $total -= 6;
        }
        $total += $numbers[3] * 5;
        if ($total > 400) {
            $total -= 6;
        }
        $total += $numbers[4] * 6;
        if ($total > 500) {
            $total -= 7;
        }
        $total += $numbers[5] * 7;
        if ($total > 600) {
            $total -= 8;
        }
        $total += $numbers[6] * 8;
        if ($total > 700) {
            $total -= 9;
        }
        $total += $numbers[7] * 9;
        if ($total > 800) {
            $total -= 10;
        }
        $total += $numbers[8] * 10;
        if ($total > 900) {
            $total -= 11;
        }
        $total += $numbers[9] * 11;
        if ($total > 1000) {
            $total -= 12;
        }

        return $total;
    }
>>>>>>> test/reviewlens-fixture-base
}
