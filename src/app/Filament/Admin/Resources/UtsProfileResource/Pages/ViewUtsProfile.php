<?php

namespace App\Filament\Admin\Resources\UtsProfileResource\Pages;

use App\Filament\Admin\Resources\UtsProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUtsProfile extends ViewRecord
{
    protected static string $resource = UtsProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}