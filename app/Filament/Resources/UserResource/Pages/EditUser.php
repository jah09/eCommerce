<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        //Filament expects a route key (like 'index', 'create', etc.), not the actual route path.
        //So '/' in UserResource::getPages() is the route key, not the actual path.
        return $this->getResource()::getUrl('index');
    }
}
