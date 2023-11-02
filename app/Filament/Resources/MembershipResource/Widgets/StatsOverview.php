<?php

namespace App\Filament\Resources\MembershipResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Membership;


class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $count1 = Membership::where('tipo_membresia_id', 2)->count();
        $count2 = Membership::where('tipo_membresia_id', 3)->count();
        $count3 = Membership::where('tipo_membresia_id', 1)->count();

        return [
            Card::make('Membership Anuales', $count1)
                ->description('32k increase')
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Membership Casuales', $count2),
            Card::make('Membership Mensuales', $count3),
        ];
    }
}
