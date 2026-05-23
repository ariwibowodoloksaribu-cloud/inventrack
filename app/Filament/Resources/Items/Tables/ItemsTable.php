<?php

namespace App\Filament\Resources\Items\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\DeleteAction;

class ItemsTable
{
    public static function configure(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('image')
                ->label('Foto')
                ->disk('public'),

            TextColumn::make('kode_barang')
                ->label('Kode')
                ->searchable()
                ->sortable(),

            TextColumn::make('nama_barang')
                ->label('Nama Barang')
                ->searchable()
                ->sortable(),

            TextColumn::make('stok')
                ->label('Stok')
                ->sortable(),

            TextColumn::make('harga')
                ->label('Harga')
                ->money('IDR')
                ->sortable(),

            TextColumn::make('kondisi')
                ->label('Kondisi')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Baik' => 'success',
                    'Rusak Ringan' => 'warning',
                    'Rusak Berat' => 'danger',
                    default => 'gray',
                }),

            TextColumn::make('lokasi')
                ->label('Lokasi')
                ->badge(),

            TextColumn::make('user.name')
                ->label('Ditambahkan Oleh'),

            TextColumn::make('created_at')
                ->label('Tanggal')
                ->dateTime('d M Y')
                ->sortable(),
        ])
        ->filters([
            //
        ])
        ->recordActions([
            EditAction::make(),
            DeleteAction::make(),
        ])
        ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
        ]);
}
}
