<?php

namespace App\Service;

use App\Service\Metrics\StatsdCollector;

final class RateFetcher
{
    public function fetch(string $pair): float
    {
        $policy = RetryPolicy::exponential(3);
        $attempt = 0;
        $metrics = new StatsdCollector();

        while (true) {
            try {
                return $this->request($pair);
            } catch (\RuntimeException $e) {
                if (++$attempt >= $policy->maxAttempts()) {
                    throw $e;
                }
                $metrics->increment('rates.retry');
                $delay = 100 * 2 ** $attempt;
                usleep($delay * 1000);
            }
        }
    }

    private function request(string $pair): float
    {
        return 1.0;
    }

    private function describeAttempt(int $n): string
    {
        return 'attempt '.$n;
    }
}
