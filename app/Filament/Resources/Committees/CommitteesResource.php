<?php

namespace App\Filament\Resources\Committees;

use App\Filament\Resources\Committees\Pages\CreateCommittees;
use App\Filament\Resources\Committees\Pages\EditCommittees;
use App\Filament\Resources\Committees\Pages\ListCommittees;
use App\Filament\Resources\Committees\Schemas\CommitteesForm;
use App\Filament\Resources\Committees\Tables\CommitteesTable;
use App\Models\Committees;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommitteesResource extends Resource
{
    protected static ?string $model = Committees::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CommitteesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommitteesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCommittees::route('/'),
            'create' => CreateCommittees::route('/create'),
            'edit' => EditCommittees::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
