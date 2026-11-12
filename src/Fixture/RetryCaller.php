<?php

declare(strict_types=1);

namespace App\Fixture;

final class RetryCaller
{
    public function __construct(private readonly Retry $retry)
    {
    }

    public function guarded(callable $job): mixed
    {
        try {
            return $this->retry->run($job, 3);
        } catch (\RuntimeException $e) {
            return null;
        }
    }

    public function plain(callable $job): mixed
    {
        return $this->retry->run($job, 5);
    }
}
