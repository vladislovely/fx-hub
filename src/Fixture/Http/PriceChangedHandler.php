<?php

declare(strict_types=1);

namespace App\Fixture\Http;

use App\Fixture\PriceService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

final class PriceChangedHandler
{
    public function __construct(private readonly PriceService $prices)
    {
    }

    #[AsMessageHandler]
    public function handle(object $message): void
    {
        $this->prices->delay(1);
    }
}
