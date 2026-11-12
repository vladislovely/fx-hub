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
}
