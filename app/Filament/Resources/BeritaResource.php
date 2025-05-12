<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use App\Models\BeritaCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    
    protected static ?string $navigationGroup = 'Manajemen Berita';
    
    protected static ?string $navigationLabel = 'Berita';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Informasi Berita')
                        ->schema([
                            Forms\Components\TextInput::make('judul')
                                ->required()
                                ->maxLength(255)
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(255)
                                ->unique(Berita::class, 'slug', ignoreRecord: true),

                            Forms\Components\Select::make('berita_category_id')
                                ->label('Kategori')
                                ->options(BeritaCategory::where('is_active', true)->pluck('nama', 'id'))
                                ->required()
                                ->searchable(),

                            Forms\Components\DateTimePicker::make('tanggal_publikasi')
                                ->label('Tanggal Publikasi')
                                ->required(),

                            Forms\Components\FileUpload::make('gambar')
                                ->label('Gambar Thumbnail')
                                ->image()
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('16:9')
                                ->imageResizeTargetWidth('800')
                                ->imageResizeTargetHeight('500')
                                ->directory('berita')
                                ->required(),
                        ])
                        ->columns(2),

                    Forms\Components\Section::make('Konten')
                        ->schema([
                            Forms\Components\RichEditor::make('konten')
                                ->required()
                                ->fileAttachmentsDisk('public')
                                ->fileAttachmentsDirectory('berita/konten'),
                        ]),
                ])
                ->columnSpan(2),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Status & Visibilitas')
                        ->schema([
                            Forms\Components\Select::make('status')
                                ->options([
                                    'draft' => 'Draft',
                                    'published' => 'Dipublikasikan',
                                    'archived' => 'Diarsipkan',
                                ])
                                ->default('draft')
                                ->required(),

                            Forms\Components\Toggle::make('is_featured')
                                ->label('Tampilkan di Headline')
                                ->default(false)
                                ->helperText('Berita akan ditampilkan di bagian utama halaman berita.'),

                            Forms\Components\Placeholder::make('views_count')
                                ->label('Jumlah Dilihat')
                                ->content(fn ($record) => $record?->views_count ?? 0),

                            Forms\Components\Placeholder::make('created_at')
                                ->label('Dibuat Pada')
                                ->content(fn ($record) => $record?->created_at?->format('d M Y H:i') ?? '-'),

                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Diperbarui Pada')
                                ->content(fn ($record) => $record?->updated_at?->format('d M Y H:i') ?? '-'),
                        ]),
                ])
                ->columnSpan(1),
        ])
        ->columns(3);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Thumbnail')
                    ->circular(false)
                    ->width(80)
                    ->height(50),
                
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('category.nama')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (Berita $record): string => $record->category?->warna ?? 'gray'),
                
                Tables\Columns\TextColumn::make('tanggal_publikasi')
                    ->label('Tanggal Publikasi')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'gray' => 'draft',
                        'success' => 'published',
                        'danger' => 'archived',
                    ]),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Headline')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('views_count')
                    ->label('Dilihat')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Dipublikasikan',
                        'archived' => 'Diarsipkan',
                    ]),
                
                Tables\Filters\SelectFilter::make('berita_category_id')
                    ->label('Kategori')
                    ->options(fn () => BeritaCategory::pluck('nama', 'id')->toArray()),
                
                Tables\Filters\Filter::make('is_featured')
                    ->label('Headline')
                    ->query(fn (Builder $query) => $query->where('is_featured', true)),
                
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dibuat dari'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Dibuat sampai'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('updateStatus')
                        ->label('Ubah Status')
                        ->icon('heroicon-o-pencil-square')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'draft' => 'Draft',
                                    'published' => 'Dipublikasikan',
                                    'archived' => 'Diarsipkan',
                                ])
                                ->required(),
                        ])
                        ->action(function (array $records, array $data) {
                            foreach ($records as $record) {
                                $record->status = $data['status'];
                                $record->save();
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                    
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tanggal_publikasi', 'desc');
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            // 'view' => Pages\ViewBerita::route('/{record}'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
    
}