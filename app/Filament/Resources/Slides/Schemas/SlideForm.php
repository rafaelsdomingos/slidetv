<?php

namespace App\Filament\Resources\Slides\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class SlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('url')
                    ->columnSpanFull()
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->downloadable()
                     ->maxSize(5120)
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
