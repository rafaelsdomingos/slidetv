<?php

namespace App\Filament\Widgets;

use App\Models\Slide;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;


class LatestSlides extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Slide::query())
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
                    ->label('Data de upload')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Data de atualização')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
