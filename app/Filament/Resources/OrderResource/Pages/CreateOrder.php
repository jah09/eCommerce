<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function getRedirectUrl(): string
    {
        //Filament expects a route key (like 'index', 'create', etc.), not the actual route path.
        //So '/' in OrderResource::getPages() is the route key, not the actual path.
        return $this->getResource()::getUrl('index');
    }
}
