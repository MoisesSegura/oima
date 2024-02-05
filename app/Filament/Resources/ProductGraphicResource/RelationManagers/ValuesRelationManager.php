<?php

namespace App\Filament\Resources\ProductGraphicResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;



class ValuesRelationManager extends RelationManager
{
    protected static string $relationship = 'values';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('year')
                    ->options(array_combine(range(now()->year, 1990), range(now()->year, 1990)))
                    ->required(),
                Forms\Components\Select::make('month')
                    ->options(array_combine(range(12, 1), range(12, 1)))
                    ->required(),

                Forms\Components\TextInput::make('value')
                ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('year')
            ->columns([
                Tables\Columns\SelectColumn::make('year')
                    ->options(array_combine(range(now()->year, 1990), range(now()->year, 1990))),

                Tables\Columns\SelectColumn::make('month')
                    ->options(array_combine(range(12, 1), range(12, 1))),
                Tables\Columns\TextInputColumn::make('value'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
