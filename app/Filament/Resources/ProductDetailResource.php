<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductDetailResource\Pages;
use App\Filament\Resources\ProductDetailResource\RelationManagers;
use App\Models\ProductDetail;
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
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Country;
use App\Models\Bibliography;
use App\Models\CommercialChain;
use App\Models\ImpRequirement;
use App\Models\ExpImpContent;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Resources\RelationManagers\RelationGroup;

class ProductDetailResource extends Resource
{
    protected static ?string $model = ProductDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationGroup = 'Product by country';

    protected static ?string $navigationLabel = 'Products by country';


    public static function form(Form $form): Form
    {
        return $form

        ->schema([             
            Tabs::make('TABS') 
            ->tabs([
                Tabs\Tab::make('General') 
                ->schema([
               
                    Section::make('Product')
                    ->schema([
                        Forms\Components\Select::make('country_id')
                        ->label('Country')
                        ->options(Country::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
    
                        Forms\Components\Select::make('product_id')
                        ->label('Product')
                        ->options(ProductTranslation::where('locale', app()->getLocale())->pluck('name', 'product_id'))
                        ->searchable()
                        ->required(),
    
                        Forms\Components\TextInput::make('known_name')
                        ->required()
                        ->maxLength(255),
                   
                    ])->columns(['sm' => 1, 'xl' => 3]),


                    Section::make('Cross Section')
                    ->schema([
                    Forms\Components\TextInput::make('transversal_section_little')->label('Little')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('transversal_section_medium')->label('Medium')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('transversal_section_big')->label('Big')
                        ->maxLength(255),
                    ])->columns(['sm' => 1, 'xl' => 3]),

                    Section::make('Longitudinal Section')
                    ->schema([
                    Forms\Components\TextInput::make('longitudinal_section_little')->label('Little')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('longitudinal_section_medium')->label('Medium')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('longitudinal_section_big')->label('Big')
                        ->maxLength(255),
                    ])->columns(['sm' => 1, 'xl' => 3]),


                    Section::make('Main producers and suppliers')
                    ->schema([
                        Forms\Components\RichEditor::make('principals')->label('producers and suppliers')
                        ->columnSpanFull(),
                        Forms\Components\Textarea::make('exports')
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('imports')
                        ->columnSpanFull(),
             
                    ])->columns(['sm' => 1, 'xl' => 3]),

                    // Section::make('Bibliography') ->relationship('bibliography')
                    // ->schema([             
                    //     Tabs::make('lang form')
                    //     ->tabs([
                    //         Tabs\Tab::make('En') 
                    //             ->schema([
                    //         Forms\Components\RichEditor::make('en.text')
                    //             ]),
                    //         Tabs\Tab::make('Es')
                    //             ->schema([
                    //         Forms\Components\RichEditor::make('es.text')                       
                    //         ]),
                    //         Tabs\Tab::make('Pt')
                    //             ->schema([
                    //         Forms\Components\RichEditor::make('pt.text')
                    //         ]),
                    //     ]),
                    // ])->Columns('full'),


                Section::make('Bibliography')
                ->relationship('bibliography')
                ->schema([
                    Repeater::make('translations')->collapsed()
                    ->relationship('translations')
                    ->schema([
                        Forms\Components\TextInput::make('locale'),
                        Forms\Components\RichEditor::make('text'),
                    ]),
                ]),

                Section::make('Commercial Chain')
                ->relationship('commercialChain')
                ->schema([
                    Repeater::make('translations')->collapsed()
                    ->relationship('translations')
                    ->schema([
                        Forms\Components\TextInput::make('locale'),
                        Forms\Components\TextInput::make('title'),
                        Forms\Components\TextInput::make('subtitle'),
                        Forms\Components\FileUpload::make('image')->nullable(),
                    ])   ->grid(3),
                ]),

                  
                Forms\Components\TextInput::make('nutricional_font')
                ->maxLength(255),
                  
                    

                // Forms\Components\TextInput::make('bibliography_id')
                //     ->numeric(),
                // Forms\Components\TextInput::make('commercial_chain_id')
                //     ->numeric(),
                // Forms\Components\TextInput::make('requirement_id')
                //     ->numeric(),
                // Forms\Components\TextInput::make('offer_calendar_id')
                //     ->numeric(),
                // Forms\Components\TextInput::make('production_id')
                //     ->numeric(),
                // Forms\Components\TextInput::make('exportation_id')
                //     ->numeric(),
                // Forms\Components\TextInput::make('importation_id')
                //     ->numeric(),
                // Forms\Components\TextInput::make('hide_locale')
                //     ->maxLength(255),
            
            ]),
                
                Tabs\Tab::make('Requirements for imports and exports')
                    ->schema([
                        Section::make('Requirements')
                        ->relationship('impRequirement')
                        ->schema([
                            Repeater::make('translations')
                            ->relationship('translations')
                            ->schema([
                                Forms\Components\TextInput::make('locale'),
                                Forms\Components\TextInput::make('title'),
                                Forms\Components\TextInput::make('subtitle'),
                            ])
                        ]),

                        Section::make('Requirements')
                        ->relationship('ImpExpContent')
                        ->schema([
                            Repeater::make('translations')
                            ->relationship('translations')
                            ->schema([
                                Forms\Components\TextInput::make('locale'),
                                Forms\Components\TextInput::make('title'),
                                Forms\Components\RichEditor::make('text'),
                            ])
                        ]),
                        
                ]),
            ]),
        ])->Columns('full');
           
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.name')
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
          
            RelationManagers\SalesRelationManager::class,
            RelationManagers\GraphicsRelationManager::class,
            RelationManagers\AgronomicsRelationManager::class,
            RelationManagers\GalleriesRelationManager::class,
            RelationManagers\NutritionalPropertyRelationManager::class,
            RelationManagers\NutritionalContentRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductDetails::route('/'),
            'create' => Pages\CreateProductDetail::route('/create'),
            'view' => Pages\ViewProductDetail::route('/{record}'),
            'edit' => Pages\EditProductDetail::route('/{record}/edit'),
        ];
    }    
}
