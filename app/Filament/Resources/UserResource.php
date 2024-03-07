<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;

use App\Models\Country;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Users';

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
                   
                    TextInput::make('name')
                    ->required(),
                    TextInput::make('email')
                    ->email()
                    ->required(),
                    TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->hiddenOn('edit', true)
                    ->required(),
                    Select::make('roles')->multiple()
                    ->relationship('roles','name')
                    ->searchable() ->preload(),

                ]),
                
                Section::make('Country')
                ->schema([
                    Forms\Components\Select::make('country_id')
                    ->label('Country')
                    ->options(Country::all()->pluck('name', 'id'))
                    ->searchable(),
                ]),

            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('roles.name')->searchable()

            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
