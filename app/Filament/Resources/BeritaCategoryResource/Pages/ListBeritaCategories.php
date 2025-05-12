<?php

namespace App\Filament\Resources\BeritaCategoryResource\Pages;

use App\Filament\Resources\BeritaCategoryResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListBeritaCategories extends ListRecords
{
    protected static string $resource = BeritaCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}