<?php

declare(strict_types=1);

namespace App\Fixture;

final class LegacyRegistry
{
    public const HANDLERS = ['legacy' => 'App\\Fixture\\LegacyThing'];

    public function handler(): string
    {
        return self::HANDLERS['legacy'];
    }
}
