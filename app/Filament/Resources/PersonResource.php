<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonResource\Pages;
use App\Filament\Resources\PersonResource\RelationManagers;
use App\Models\Person;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Traits\Translatable;
// use App\Models\Country;
use App\Models\InfoCountry;
use App\Models\PersonCategory;


class PersonResource extends Resource
{
    protected static ?string $model = Person::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Who we are';

    public static function form(Form $form): Form
    {

        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('country_id')
                ->label('Country')
                ->options(InfoCountry::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\Select::make('category_id')
                ->label('Category')
                ->options(PersonCategory::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),

                Forms\Components\FileUpload::make('photo')
                ->disk('public')
                ->directory('uploads/person_photos'),
       

            Tabs::make('lang form') 
            ->tabs([
                Tabs\Tab::make('En') 
                    ->schema([
                        Forms\Components\TextInput::make('en.title')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('en.position')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('en.description')
                        ->maxLength(255),

                    

           
                    ]),
                Tabs\Tab::make('Es')
                    ->schema([
                        Forms\Components\TextInput::make('es.title')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('es.position')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('es.description')
                        ->maxLength(255),

                       
                ]),
                Tabs\Tab::make('Pt')
                    ->schema([
                        Forms\Components\TextInput::make('pt.title')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('pt.position')
                        ->maxLength(255),

                        Forms\Components\TextInput::make('pt.description')
                        ->maxLength(255),

                       
                ]),
                
            ]),
        ])
        ->columns([
            'sm' => '2',
            'lg' => 'full',
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('personcategory.name')
                    ->label('Category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('infocountry.name')
                    ->label('Country')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePerson::route('/create'),
            'view' => Pages\ViewPerson::route('/{record}'),
            'edit' => Pages\EditPerson::route('/{record}/edit'),
        ];
    }    
}
