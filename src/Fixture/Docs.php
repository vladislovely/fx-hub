<?php

declare(strict_types=1);

namespace App\Fixture;

final class Docs
{
    /** Adds two numbers. */
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}
