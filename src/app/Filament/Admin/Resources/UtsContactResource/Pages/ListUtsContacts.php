<?php

namespace App\Filament\Admin\Resources\UtsContactResource\Pages;

use App\Filament\Admin\Resources\UtsContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUtsContacts extends ListRecords
{
    protected static string $resource = UtsContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}