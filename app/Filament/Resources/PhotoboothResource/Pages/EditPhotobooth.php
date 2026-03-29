<?php

namespace App\Filament\Resources\PhotoboothResource\Pages;

use App\Filament\Resources\PhotoboothResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhotobooth extends EditRecord
{
    protected static string $resource = PhotoboothResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
