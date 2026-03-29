<?php

namespace App\Filament\Resources\PhotoboothResource\Pages;

use App\Filament\Resources\PhotoboothResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhotobooths extends ListRecords
{
    protected static string $resource = PhotoboothResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
