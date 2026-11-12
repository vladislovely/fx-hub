<?php

declare(strict_types=1);

namespace App\Fixture;

final class Comments
{
    public function attempt(callable $call): mixed
    {
        // retry once
        try {
            return $call();
        } catch (\Throwable) {
            return $call();
        }
    }
}
