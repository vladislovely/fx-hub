<?php

declare(strict_types=1);

namespace App\Fixture;

final class Source
{
<<<<<<< HEAD
=======
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
}
