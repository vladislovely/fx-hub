<?php

declare(strict_types=1);

namespace App\Fixture;

use Psr\Log\LoggerInterface;

final class Imports
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function log(string $message): void
    {
        $this->logger->info($message);
    }
}
