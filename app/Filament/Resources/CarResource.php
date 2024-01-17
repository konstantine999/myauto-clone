<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use App\Models\CarColors;
use App\Models\CarModell;
use App\Models\Category;
use App\Models\FuelType;
use App\Models\InteriorMaterial;
use App\Models\Manufacturer;
use App\Models\Transmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'მანქანები';

    protected static ?string $label = 'მანქანები ';


    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        $userId = auth()->id();
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\Select::make('manufacturer_id')
                        ->required()
                        ->options(function () {
                            return Manufacturer::pluck('name', 'id')->toArray();
                        })
                        ->label('მწარმოებელი')
                        ->native(false)
                        ->placeholder('მწარმოებელი')
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $set('model_id', null);
                        })
                        ->live(),
                    Forms\Components\Select::make('model_id')
                        ->required()
                        ->label('მანქანის მოდელი')
                        ->placeholder('მანქანის მოდელი')
//                        ->hidden(function (callable $get) {
//                            if ($get('manufacturer_id') === null) return true;
//                            return false;
//                        })
                        ->options(function (callable $get) {
                            return CarModell::where('manufacturer_id', $get('manufacturer_id'))->pluck('name', 'id');
                        })
                        ->native(false)
                        ->disabledOn(true),
                    Forms\Components\Select::make('category_id')
                        ->required()
                        ->options(function () {
                            return Category::pluck('name', 'id')->toArray();
                        })
                        ->native(false)
                        ->placeholder('კატეგორია')
                        ->label('კატეგორია'),
                    Forms\Components\DatePicker::make('manufacture_year')
                        ->required()
                        ->label('გამოშვების წელი')
                        ->placeholder('გამოშვების წელი')
                        ->native(false),
                    Forms\Components\Select::make('cylinder_count')
                        ->required()
                        ->placeholder('ცილინდრების რაოდენობა')
                        ->options([
                            1,
                            2,
                            3,
                            4,
                            5,
                            6,
                            7,
                            8,
                            9,
                            10,
                            11,
                            12
                        ])
                        ->label('ცილინდრების რაოდენობა')
                        ->native(false),
                    Forms\Components\Select::make('engine_size')
                        ->required()
                        ->options([
                            1,
                            2,
                            3,
                            4,
                            5,
                            6,
                            7,
                            8,
                            9,
                            10,
                            11,
                            12
                        ])
                        ->label('ძრავის მოცულობა')
                        ->placeholder('ძრავის მოცულობა')
                        ->native(false),
                    Forms\Components\Select::make('airbag_count')
                        ->required()
                        ->options([
                            1,
                            2,
                            3,
                            4,
                            5,
                            6,
                            7,
                            8,
                            9,
                            10,
                            11,
                            12
                        ])
                        ->label('აირბეგის რაოდენობა')
                        ->native(false),
                    Forms\Components\TextInput::make('mileage')
                        ->required()
                        ->placeholder('გარბენი')
                        ->label('გარბენი')
                        ->numeric(),
                ])
                ->columns(2),
//                Forms\Components\TextInput::make('user_id')
//                    ->required()
//                    ->default($userId)
//                    ->hidden(),
                Forms\Components\Select::make('transmission_id')
                    ->required()
                    ->options(function () {
                        return Transmission::pluck('name', 'id')->toArray();
                    })
                    ->label('გადაცემათა კოლოფი')
                    ->placeholder('გადაცემათა კოლოფი')
                    ->native(false),
                Forms\Components\Select::make('fuel_type')
                    ->required()
                    ->options(function () {
                        return FuelType::pluck('name', 'id')->toArray();
                    })
                    ->label('საწვავის ტიპი')
                    ->placeholder('საწვავის ტიპი')
                    ->native(false),
                Forms\Components\Select::make('color_id')
                    ->required()
                    ->options(function () {
                        return CarColors::pluck('name', 'id')->toArray();
                    })
                    ->label('მანქანის ფერი')
                    ->placeholder('მანქანის ფერი')
                    ->native(false),
                Forms\Components\Select::make('interior_material')
                    ->required()
                    ->options(function () {
                        return InteriorMaterial::pluck('name', 'id')->toArray();
                    })
                    ->placeholder('სალონის მატერიალი')
                    ->label('სალონის მატერიალი')
                    ->native(false),
                Forms\Components\Select::make('mileage_dimension')
                    ->required()
                    ->options([
                        'კილომეტრი',
                        'მილი'
                    ])
                    ->placeholder('გარბენის დიმენსია')
                    ->label('გარბენის დიმენსია')
                    ->native(false),
                Forms\Components\Select::make('steering_wheel_position')
                    ->required()
                    ->options([
                        'მარჯვენა',
                        'მარცხენა'
                    ])
                    ->placeholder('რულის პოზიცია')
                    ->label('რულის პოზიცია')
                    ->native(false),
                Forms\Components\Select::make('drive')
                    ->required()
                    ->options([
                        'წინა',
                        'უკანა',
                        '4X4'
                    ])
                    ->placeholder('წამყვანი თვლები')
                    ->label('წამყვანი თვლები')
                    ->native(false),
                Forms\Components\TextInput::make('door_count')
                    ->required()
                    ->numeric()
                    ->label('კარების რაოდენობა')
                    ->placeholder('კარების რაოდენობა'),
                Forms\Components\Toggle::make('have_cats')
                    ->required()
                    ->label('კატალიზატორი'),
                Forms\Components\Toggle::make('is_duty_paid')
                    ->required()
                    ->label('განბაჟებული'),
                Forms\Components\Toggle::make('is_turbo')
                    ->required()
                    ->label('ტურბო'),
                Forms\Components\Toggle::make('is_inspection_passed')
                    ->required()
                    ->label('ტექ დათვალირება'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->label('ფასი')
                    ->placeholder('ფასი')
                    ->prefix('$'),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->label('აღწერა')
                    ->placeholder('აღწერა')
                    ->maxLength(255),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('manufacturer_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('transmission_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fuel_type')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('color_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('interior_material')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('engine_size')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cylinder_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('airbag_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_turbo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('mileage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mileage_dimension')
                    ->searchable(),
                Tables\Columns\TextColumn::make('steering_wheel_position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('drive')
                    ->searchable(),
                Tables\Columns\TextColumn::make('door_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('have_cats')
                    ->boolean(),
                Tables\Columns\TextColumn::make('manufacture_year')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_duty_paid')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_inspection_passed')
                    ->boolean(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'view' => Pages\ViewCar::route('/{record}'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
