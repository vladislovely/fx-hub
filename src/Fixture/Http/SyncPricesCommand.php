<?php

declare(strict_types=1);

namespace App\Fixture\Http;

use App\Fixture\PriceService;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'app:sync-prices', description: 'Normalises prices')]
final class SyncPricesCommand
{
    public function __construct(private readonly PriceService $prices)
    {
    }

    public function __invoke(): int
    {
        return $this->prices->normalize(-5);
    }
}
