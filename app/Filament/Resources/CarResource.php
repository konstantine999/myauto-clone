<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use App\Models\InteriorMaterial;
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\TextInput::make('user_id')
//                    ->required()
//                    ->numeric(),
//                Forms\Components\TextInput::make('manufacturer_id')
//                    ->required()
//                    ->numeric(),
//                Forms\Components\TextInput::make('model_id')
//                    ->required()
//                    ->numeric(),
//                Forms\Components\TextInput::make('category_id')
//                    ->required()
//                    ->numeric(),
//                Forms\Components\TextInput::make('transmission_id')
//                    ->required()
//                    ->numeric(),
//                Forms\Components\TextInput::make('fuel_type')
//                    ->required()
//                    ->numeric(),
//                Forms\Components\TextInput::make('color_id')
//                    ->required()
//                    ->numeric(),
                Forms\Components\Select::make('სალონის მატერიალი')
                    ->required()
                    ->options(function () {
                        return InteriorMaterial::pluck('name', 'id')->toArray();
                    })
                    ->placeholder('სალონის მატერიალი')
                    ->native(false),
                Forms\Components\Select::make('ძრავის მოცულობა')
                    ->required()
                    ->options([
                        1 => "Bmw"
                    ])
                    ->placeholder('ძრავის მოცულობა')
                    ->native(false),
                Forms\Components\Select::make('ცილინდრების რაოდენობა')
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
                    ->native(false),
                Forms\Components\TextInput::make('airbag_count')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('is_turbo')
                    ->required(),
                Forms\Components\TextInput::make('mileage')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('mileage_dimension')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('steering_wheel_position')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('drive')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('door_count')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('have_cats')
                    ->required(),
                Forms\Components\DatePicker::make('manufacture_year')
                    ->required(),
                Forms\Components\Toggle::make('is_duty_paid')
                    ->required(),
                Forms\Components\Toggle::make('is_inspection_passed')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('description')
                    ->required()
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
