<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        //Filament expects a route key (like 'index', 'create', etc.), not the actual route path.
        //So '/' in CategoryResource::getPages() is the route key, not the actual path.
        return $this->getResource()::getUrl('index');
    }
}
