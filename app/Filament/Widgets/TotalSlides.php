<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


use App\Models\Slide;

class TotalSlides extends StatsOverviewWidget
{
    protected static ?int $sort = 0;

    public function getColumns(): int | array
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Slides Ativos', Slide::where('active', 1)->count()),
            Stat::make('Total de Slides', Slide::count()),
        ];
    }
}
