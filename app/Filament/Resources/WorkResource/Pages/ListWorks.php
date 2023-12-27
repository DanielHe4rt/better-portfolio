<?php

namespace App\Filament\Resources\WorkResource\Pages;

use App\Filament\Resources\WorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorks extends ListRecords
{
    protected static string $resource = WorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
