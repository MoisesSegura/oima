<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
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
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use App\Models\EventDuration;
use App\Models\Language;
use App\Models\LanguageTranslation;
use App\Models\AssistanceType;
use App\Models\AssistanceTypeTranslation;
use App\Models\EventAssistanceType;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Forms\Components\Select;

use Filament\Forms\Components\TagsInput;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Blog';

    public function getRelationship(): Builder | HasMany
    {
        return $this->getOwnerRecord()->{static::getRelationshipName()}()->with(['translations']);
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('') 
                ->tabs([
                    Tabs\Tab::make('En') 
                        ->schema([
                        Forms\Components\TextInput::make('en.name'),
                        Forms\Components\RichEditor::make('en.description'),
                        Forms\Components\RichEditor::make('en.general_objective'),
                        Forms\Components\TextInput::make('en.address'),
                        Forms\Components\TextInput::make('en.duration'),
                
                        ]),
                    Tabs\Tab::make('Es')
                        ->schema([
                        Forms\Components\TextInput::make('es.name'),
                        Forms\Components\RichEditor::make('es.description'),
                        Forms\Components\RichEditor::make('es.general_objective'),
                        Forms\Components\TextInput::make('es.address'),
                        Forms\Components\TextInput::make('es.duration'),
                           
                    ]),
                    Tabs\Tab::make('Pt')
                        ->schema([
                        Forms\Components\TextInput::make('pt.name'),
                        Forms\Components\RichEditor::make('pt.description'),
                        Forms\Components\RichEditor::make('pt.general_objective'),
                        Forms\Components\TextInput::make('pt.address'),
                        Forms\Components\TextInput::make('pt.duration'),
                    ]),
                    
                ]),

                Forms\Components\DatePicker::make('start')
                ->required(),
                Forms\Components\DatePicker::make('end'),
                Forms\Components\FileUpload::make('image')->nullable()
                ->image(),
                Forms\Components\Toggle::make('delete_image'),
                Forms\Components\TextInput::make('year')
                ->required()
                ->numeric(),

                Forms\Components\Select::make('assistance_type_id')
                ->relationship('assistanceTypes')
                        ->multiple()
                        ->label('Assistance type')
                        ->options(AssistanceTypeTranslation::where('locale', app()->getLocale())->pluck('name', 'assistance_type_id'))
                        ->searchable(),

                Forms\Components\Select::make('event_language_id')
                ->relationship('languages')
                        ->multiple()
                        ->label('Available languages')
                        ->options(LanguageTranslation::where('locale', app()->getLocale())->pluck('name', 'language_id'))
                        ->searchable(),
 


        ])
        ->columns([
            'sm' => '3',
            'lg' => 'full',
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->wrap()
                ->sortable(),
                Tables\Columns\TextColumn::make('start')
                    ->dateTime()
                    ->limit(13)
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->dateTime()
                    ->limit(13)
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
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
           RelationManagers\EventDurationRelationManager::class,
           RelationManagers\EventScheduleRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'view' => Pages\ViewEvent::route('/{record}'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }    
}
