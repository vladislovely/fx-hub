<?php

declare(strict_types=1);

namespace App\Fixture\Http;

use App\Fixture\NewHome;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'app:rebuild-delay', description: 'Recomputes the retry delay table')]
final class RebuildDelayCommand
{
    public function __construct(private readonly NewHome $delays)
    {
    }

    public function __invoke(): int
    {
        $total = 0;
        foreach ([1, 2, 3] as $attempt) {
            $total += $this->delays->calculateDelay($attempt);
        }

        return $total;
    }
}
