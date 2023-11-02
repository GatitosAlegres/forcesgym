<?php

namespace App\Filament\Resources\MembershipResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\MembershipResource;

class CreateMembership extends CreateRecord
{
    protected static string $resource = MembershipResource::class;
}
