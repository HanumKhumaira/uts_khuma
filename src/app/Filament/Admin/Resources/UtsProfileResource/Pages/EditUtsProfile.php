<?php

namespace App\Filament\Admin\Resources\UtsProfileResource\Pages;

use App\Filament\Admin\Resources\UtsProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUtsProfile extends EditRecord
{
    protected static string $resource = UtsProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
