<?php

namespace App\Filament\Resources\PartnerResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PartnerResource;

class EditPartner extends EditRecord
{
    protected static string $resource = PartnerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
