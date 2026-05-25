<?php

namespace App\Filament\Admin\Resources\UtsSkillResource\Pages;

use App\Filament\Admin\Resources\UtsSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUtsSkills extends ListRecords
{
    protected static string $resource = UtsSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
