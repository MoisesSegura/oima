<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteTextResource\Pages;
use App\Filament\Resources\SiteTextResource\RelationManagers;
use App\Models\SiteText;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use App\Filament\Traits\Translatable;
use Filament\Forms\Components\FileUpload;

use Filament\Forms\Components\Repeater;
use App\Models\History;
use App\Models\ExecutiveCommitee;
use App\Models\Extra;


class SiteTextResource extends Resource
{
    protected static ?string $model = SiteText::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'OIMA';

    protected static ?string $navigationLabel = 'Website Texts';

    use Translatable;

    public static function form(Form $form): Form
    {

        return $form

        ->schema([             
            Tabs::make('TABS') 
            ->tabs([
                Tabs\Tab::make('General') 
                ->schema([


                    Tabs::make('oima') 
                    ->tabs([
                    Tabs\Tab::make('Es') 
                        ->schema([
                            Forms\Components\TextInput::make('es.banner_title'),
                            Forms\Components\TextInput::make('es.banner_subtitle'),
                            Forms\Components\TextInput::make('es.know_oima_title'),
                            Forms\Components\RichEditor::make('es.know_oima_description'),
                            Forms\Components\TextInput::make('es.catalog_title')->required(),
                            Forms\Components\TextInput::make('es.catalog_subtitle')->required(),
                            Forms\Components\RichEditor::make('es.catalog_description'),
                            Forms\Components\TextInput::make('es.oima_purpose')->required(),
    
                            ]),
                        Tabs\Tab::make('En')
                            ->schema([
                                Forms\Components\TextInput::make('en.banner_title'),
                                Forms\Components\TextInput::make('en.banner_subtitle'),
                                Forms\Components\TextInput::make('en.know_oima_title'),
                                Forms\Components\RichEditor::make('en.know_oima_description'),
                                Forms\Components\TextInput::make('en.catalog_title')->required(),
                                Forms\Components\TextInput::make('en.catalog_subtitle')->required(),
                                Forms\Components\RichEditor::make('en.catalog_description'),
                                Forms\Components\TextInput::make('en.oima_purpose')->required(),
                               
                        ]),
                        Tabs\Tab::make('Pt')
                            ->schema([
                                Forms\Components\TextInput::make('pt.banner_title'),
                                Forms\Components\TextInput::make('pt.banner_subtitle'),
                                Forms\Components\TextInput::make('pt.know_oima_title'),
                                Forms\Components\RichEditor::make('pt.know_oima_description'),
                                Forms\Components\TextInput::make('pt.catalog_title')->required(),
                                Forms\Components\TextInput::make('pt.catalog_subtitle')->required(),
                                Forms\Components\RichEditor::make('pt.catalog_description'),
                                Forms\Components\TextInput::make('pt.oima_purpose')->required(),
                               
                        ]),
                        
                    ]), 

                    
    

                            Forms\Components\Toggle::make('active')
                                ->required(),
                        
                

                            Forms\Components\TextInput::make('contact_president')
                                ->required()
                                ->maxLength(255),
                                Forms\Components\FileUpload::make('president_photo')
                                ->disk('public')
                                ->directory('uploads/person_photos'),
                            Forms\Components\TextInput::make('contact_secretary')
                                ->required()
                                ->maxLength(255),
                                Forms\Components\FileUpload::make('secretary_photo')
                                ->disk('public')
                                ->directory('uploads/person_photos'),
                            Forms\Components\TextInput::make('contact_phone')
                                ->tel()
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('contact_email')
                                ->email()
                                ->required()
                                ->maxLength(255),
            
            ]),

                        Tabs\Tab::make('OIMA')
                        ->schema([
                            
                            Section::make('OIMA')
                            ->relationship('oima')
                            ->schema([

                                Forms\Components\FileUpload::make('image')
                                ->image(),

                                Repeater::make('translations') ->collapsible()
                                ->relationship('translations')
                                ->schema([
                                    Select::make('locale')
                                    ->options(function () {
                                        $options = [
                                            'en' => 'English',
                                            'es' => 'Español',
                                            'pt' => 'Português',
                                        ];
                                        return $options;
                                    }),
                                    Forms\Components\TextInput::make('title'),
                                    Forms\Components\RichEditor::make('description'),
                                    Forms\Components\RichEditor::make('mision'),
                                    Forms\Components\RichEditor::make('vision'),
                                ]),
                            ]),



                    ]),

                
                    Tabs\Tab::make('History')
                        ->schema([
                        
                            Section::make('History')
                            ->relationship('history')
                            ->schema([
                                Repeater::make('translations')->collapsed()
                                ->relationship('translations')
                                ->schema([
                                   
                                Select::make('locale')
                                ->options(function () {
                                    $options = [
                                        'en' => 'English',
                                        'es' => 'Español',
                                        'pt' => 'Português',
                                    ];
                                    return $options;
                                }),
                                    Forms\Components\TextInput::make('title'),
                                    Forms\Components\RichEditor::make('short_description'),
                                    Forms\Components\RichEditor::make('definition'),
                                    Forms\Components\RichEditor::make('origin'),
                                    Forms\Components\RichEditor::make('strategy'),
                                    Forms\Components\RichEditor::make('birth'),
                                ]),
                            ]),
                    ]),
                
                    Tabs\Tab::make('Executive Commitee')
                    ->schema([
                    
                        Section::make('Executive commitee')
                        ->relationship('executiveCommitee')
                        ->schema([
                            Repeater::make('translations')
                            ->relationship('translations')
                            ->schema([
                                Select::make('locale')
                                ->options(function () {
                                    $options = [
                                        'en' => 'English',
                                        'es' => 'Español',
                                        'pt' => 'Português',
                                    ];
                                    return $options;
                                }),
                                Forms\Components\TextInput::make('title'),
                                Forms\Components\RichEditor::make('description'),
                            ]),
                            Forms\Components\FileUpload::make('image')
                            ->disk('public')
                        ->directory('uploads/executive_commitee'),
                        ]),
                ]),

                    Tabs\Tab::make('Extras')
                    ->schema([
                    
                        Section::make('Extras')
                        ->relationship('extra')
                        ->schema([
                            Repeater::make('translations')
                            ->relationship('translations')
                            ->schema([
                                Select::make('locale')
                                ->options(function () {
                                    $options = [
                                        'en' => 'English',
                                        'es' => 'Español',
                                        'pt' => 'Português',
                                    ];
                                    return $options;
                                }),
                                Forms\Components\TextInput::make('document_repository'),
                                Forms\Components\TextInput::make('catalog')->label('catalog (home)'),
                                Forms\Components\TextInput::make('catalog_description')->label('catalog description (catalog)'),
                                Forms\Components\TextInput::make('contact_sended'),
                                Forms\Components\TextInput::make('more_information'),
                                Forms\Components\TextInput::make('publications')->label('publications & technical documents (repositorio)'),
                                Forms\Components\TextInput::make('presentations')->label('presentations (repositorio)'),
                                Forms\Components\TextInput::make('laboral_documents')->label('regional reports  (repositorio)'),
                                Forms\Components\TextInput::make('dictionary')->label('dictionary (repositorio)'),
                                Forms\Components\TextInput::make('videos')->label('videos (repositorio)'),
                                Forms\Components\TextInput::make('procedure_norms')->label('procedure norms (repositorio)'),
                                Forms\Components\TextInput::make('meetings'),
                               
                                
                            ]),
                            Forms\Components\FileUpload::make('image')
                            ->disk('public')
                            ->directory('uploads/extras'),
                        ]),
                ]),


            ]),
        ])->Columns('full');
     
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('oima_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
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
            RelationManagers\AchievementsRelationManager::class,
            RelationManagers\StatisticsRelationManager::class,
            RelationManagers\WorkPrincipleRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteTexts::route('/'),
            'create' => Pages\CreateSiteText::route('/create'),
            'view' => Pages\ViewSiteText::route('/{record}'),
            'edit' => Pages\EditSiteText::route('/{record}/edit'),
        ];
    }    
}
