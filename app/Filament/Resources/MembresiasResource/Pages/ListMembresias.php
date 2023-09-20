<?php

namespace App\Filament\Resources\MembresiasResource\Pages;

use App\Filament\Resources\MembresiasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MembresiasResource\Widgets\StatsOverview;


class ListMembresias extends ListRecords
{
    protected static string $resource = MembresiasResource::class;

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
