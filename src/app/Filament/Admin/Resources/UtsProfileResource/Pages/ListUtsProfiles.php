<?php

namespace App\Filament\Admin\Resources\UtsProfileResource\Pages;

use App\Filament\Admin\Resources\UtsProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUtsProfiles extends ListRecords
{
    protected static string $resource = UtsProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
