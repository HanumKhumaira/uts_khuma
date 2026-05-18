<?php

namespace App\Filament\Admin\Resources\UtsProjectResource\Pages;

use App\Filament\Admin\Resources\UtsProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUtsProject extends ViewRecord
{
    protected static string $resource = UtsProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}