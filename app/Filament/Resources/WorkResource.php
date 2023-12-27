<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkResource\Pages;
use App\Filament\Resources\WorkResource\RelationManagers;
use App\Models\Work;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkResource extends Resource
{
    protected static ?string $model = Work::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('skills')
                    ->multiple()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\Select::make('type_id')
                            ->relationship('type', 'name')
                            ->required(),
                        Forms\Components\Select::make('time_id')
                            ->required()
                            ->relationship('time', 'name'),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('comment')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->relationship(titleAttribute: 'name'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('joined_at')
                    ->required(),
                Forms\Components\DatePicker::make('lefted_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('joined_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lefted_at')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListWorks::route('/'),
            'create' => Pages\CreateWork::route('/create'),
            'edit' => Pages\EditWork::route('/{record}/edit'),
        ];
    }
}
