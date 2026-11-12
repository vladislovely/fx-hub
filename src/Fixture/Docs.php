<?php

declare(strict_types=1);

namespace App\Fixture;

final class Docs
{
    /** Adds two integers and returns the sum. */
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}
