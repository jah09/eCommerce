<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getRedirectUrl(): string
    {
        //Filament expects a route key (like 'index', 'create', etc.), not the actual route path.
        //So '/' in ProductResource::getPages() is the route key, not the actual path.
        return $this->getResource()::getUrl('index');
    }
}
