<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaCategoryResource\Pages;
use App\Models\BeritaCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BeritaCategoryResource extends Resource
{
    protected static ?string $model = BeritaCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    
    protected static ?string $navigationGroup = 'Manajemen Berita';
    
    protected static ?string $navigationLabel = 'Kategori Berita';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(BeritaCategory::class, 'slug', ignoreRecord: true),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->rows(3)
                            ->maxLength(500),
                        
                        Forms\Components\ColorPicker::make('warna')
                            ->required(),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\ColorColumn::make('warna')
                    ->label('Warna'),
                
                Tables\Columns\TextColumn::make('berita_count')
                    ->counts('berita')
                    ->label('Jumlah Berita'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Status')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->label('Dibuat')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('active')
                    ->label('Hanya yang aktif')
                    ->query(fn ($query) => $query->where('is_active', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBeritaCategories::route('/'),
            'create' => Pages\CreateBeritaCategory::route('/create'),
            'edit' => Pages\EditBeritaCategory::route('/{record}/edit'),
        ];
    }
}