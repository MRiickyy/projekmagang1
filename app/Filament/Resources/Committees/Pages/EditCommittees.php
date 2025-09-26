<?php

namespace App\Filament\Resources\Committees\Pages;

use App\Filament\Resources\Committees\CommitteesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditCommittees extends EditRecord
{
    protected static string $resource = CommitteesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
