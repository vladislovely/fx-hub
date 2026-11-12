<?php

declare(strict_types=1);

namespace App\Fixture;

final class Retry
{
    public function run(callable $job, int $attempts): mixed
    {
        for ($i = 1; $i <= $attempts; ++$i) {
            $result = $job($i);
            if (null !== $result) {
                return $result;
            }
        }
        throw new \RuntimeException('Gave up after '.$attempts.' attempts');
    }
}
