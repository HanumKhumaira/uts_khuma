<?php

namespace App\Filament\Admin\Resources\UtsSkillResource\Pages;

use App\Filament\Admin\Resources\UtsSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUtsSkill extends EditRecord
{
    protected static string $resource = UtsSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
