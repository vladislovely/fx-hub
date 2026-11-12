<?php

declare(strict_types=1);

namespace App\Fixture\Http;

use App\Fixture\Target;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reports', name: 'reports_')]
final class ReportController
{
    public function __construct(private readonly Target $report)
    {
    }

    #[Route('/table', name: 'table', methods: ['POST'])]
    public function table(array $rows): string
    {
        return $this->report->draw($rows, '');
    }

    #[Route('/total', name: 'total', methods: ['POST'])]
    public function total(array $numbers): int
    {
        return $this->report->sum($numbers);
    }

    #[Route('/wait/{try}', name: 'wait')]
    public function wait(int $try): int
    {
        return $this->report->wait($try, 5000);
    }
}
