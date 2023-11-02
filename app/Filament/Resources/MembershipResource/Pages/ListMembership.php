<?php

namespace App\Filament\Resources\MembershipResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MembershipResource;
use App\Filament\Resources\MembershipResource\Widgets\StatsOverview;


class ListMembership extends ListRecords
{
    protected static string $resource = MembershipResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class
        ];
    }
}
