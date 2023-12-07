<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FosUserResource\Pages;
use App\Filament\Resources\FosUserResource\RelationManagers;
use App\Models\FosUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Section;

class FosUserResource extends Resource
{
    protected static ?string $model = FosUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Section::make('Profile')
                ->schema([
                Forms\Components\TextInput::make('firstname')
                    ->maxLength(64),
                Forms\Components\TextInput::make('lastname')
                    ->maxLength(64),
                Forms\Components\TextInput::make('phone')
                    ->maxLength(64),
                ]),


                Section::make('General')
                ->schema([
                    Forms\Components\TextInput::make('username')
                    ->required()
                    ->maxLength(180),

                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(180),

                    Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                ]),


                Section::make('Country')
                ->schema([
                    Forms\Components\TextInput::make('country_id')
                    ->numeric(),
                ]),
              
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('roles'),
        
      
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListFosUsers::route('/'),
            'create' => Pages\CreateFosUser::route('/create'),
            'view' => Pages\ViewFosUser::route('/{record}'),
            'edit' => Pages\EditFosUser::route('/{record}/edit'),
        ];
    }    
}
