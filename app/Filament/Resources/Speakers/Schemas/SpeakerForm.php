<?php

namespace App\Filament\Resources\Speakers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SpeakerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('university')
                    ->required(),
                FileUpload::make('image')
                    ->image(),
                Textarea::make('biodata')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('full_biodata')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('speaker_type')
                    ->options(['keynote' => 'Keynote', 'tutorial' => 'Tutorial'])
                    ->required(),
            ]);
    }
}
