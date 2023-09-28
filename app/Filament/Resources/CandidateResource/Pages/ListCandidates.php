<?php

namespace App\Filament\Resources\CandidateResource\Pages;

use App\Filament\Resources\CandidateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCandidates extends ListRecords
{
    protected static string $resource = CandidateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
