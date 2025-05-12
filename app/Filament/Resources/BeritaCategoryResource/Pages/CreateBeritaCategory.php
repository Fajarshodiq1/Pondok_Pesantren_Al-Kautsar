<?php

namespace App\Filament\Resources\BeritaCategoryResource\Pages;

use App\Filament\Resources\BeritaCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBeritaCategory extends CreateRecord
{
    protected static string $resource = BeritaCategoryResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}