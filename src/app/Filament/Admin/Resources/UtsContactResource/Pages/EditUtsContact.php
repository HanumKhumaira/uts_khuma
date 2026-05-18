<?php

namespace App\Filament\Admin\Resources\UtsContactResource\Pages;

use App\Filament\Admin\Resources\UtsContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUtsContact extends EditRecord
{
    protected static string $resource = UtsContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}