<?php

namespace App\Service;

final class RetryPolicy
{
    public function __construct(private readonly int $maxAttempts)
    {
    }

    public static function withBackoff(int $maxAttempts): self
    {
        return new self($maxAttempts);
    }

    public function maxAttempts(): int
    {
        return $this->maxAttempts;
    }
}
