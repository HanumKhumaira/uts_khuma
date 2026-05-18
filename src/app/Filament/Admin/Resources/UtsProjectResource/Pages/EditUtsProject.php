<?php

namespace App\Filament\Admin\Resources\UtsProjectResource\Pages;

use App\Filament\Admin\Resources\UtsProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUtsProject extends EditRecord
{
    protected static string $resource = UtsProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}