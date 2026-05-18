<?php

namespace App\Filament\Admin\Resources\UtsProjectResource\Pages;

use App\Filament\Admin\Resources\UtsProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUtsProjects extends ListRecords
{
    protected static string $resource = UtsProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}