<?php

namespace App\Filament\Resources\MembershipResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\MembershipResource;

class EditMembership extends EditRecord
{
    protected static string $resource = MembershipResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
