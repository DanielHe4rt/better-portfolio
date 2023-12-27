<?php

namespace App\Filament\Resources\Skill\TimeResource\Pages;

use App\Filament\Resources\Skill\TimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTime extends EditRecord
{
    protected static string $resource = TimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
