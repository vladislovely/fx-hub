<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

final class AttemptLogger
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function failed(int $attempt, \Throwable $e): void
    {
        $this->logger->warning('rate request failed', ['attempt' => $attempt, 'error' => $e->getMessage()]);
    }

    public function summary(array $attempts): string
    {
        return implode(',', $attempts);
    }

    private function formatAttempt(int $n): string
    {
        return sprintf('#%d', $n);
    }
}
