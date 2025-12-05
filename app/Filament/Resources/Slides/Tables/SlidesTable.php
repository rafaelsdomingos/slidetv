<?php

namespace App\Filament\Resources\Slides\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class SlidesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('url')
                    ->label('Wallpaper')
                    ->disk('public')
                    ->imageWidth(200)
                    ->imageHeight(113),
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                ToggleColumn::make('active')
                    ->label('Ligado')
                    ->onColor('success')
                    ->offColor('danger'),
                TextColumn::make('created_at')
                    ->label('Criação')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Atualização')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
