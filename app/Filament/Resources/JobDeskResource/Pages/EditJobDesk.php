<?php

namespace App\Filament\Resources\JobDeskResource\Pages;

use App\Filament\Resources\JobDeskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobDesk extends EditRecord
{
    protected static string $resource = JobDeskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
