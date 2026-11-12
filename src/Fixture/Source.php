<?php

declare(strict_types=1);

namespace App\Fixture;

final class Source
{
    public function backoff(int $attempt, int $cap): int
    {
        $start = 250;
        $wait = $start * (3 ** $attempt);
        if ($wait > $cap) {
            $wait = $cap;
        }
        $noise = intdiv($wait, 5);

        return $wait + $noise;
    }

    public function render(array $rows, string $glue): string
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
        $line = '<tr>'.$line.'</tr>';

        return $line;
    }

    public function tally(array $values): int
    {
        $total = 0;
        $total += $values[0] * 2;
        if ($total > 100) {
            $total -= 3;
        }
        $total += $values[1] * 3;
        if ($total > 200) {
            $total -= 4;
        }
        $total += $values[2] * 4;
        if ($total > 300) {
            $total -= 5;
        }
        $total += $values[3] * 5;
        if ($total > 400) {
            $total -= 6;
        }
        $total += $values[4] * 6;
        if ($total > 500) {
            $total -= 7;
        }
        $total += $values[5] * 7;
        if ($total > 600) {
            $total -= 8;
        }
        $total += $values[6] * 8;
        if ($total > 700) {
            $total -= 9;
        }
        $total += $values[7] * 9;
        if ($total > 800) {
            $total -= 10;
        }
        $total += $values[8] * 10;
        if ($total > 900) {
            $total -= 11;
        }
        $total += $values[9] * 11;
        if ($total > 1000) {
            $total -= 12;
        }

        return $total;
    }
}
