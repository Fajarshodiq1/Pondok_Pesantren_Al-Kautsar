<?php

namespace App\Filament\Resources\BeritaCategoryResource\Pages;

use App\Filament\Resources\BeritaCategoryResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditBeritaCategory extends EditRecord
{
    protected static string $resource = BeritaCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}