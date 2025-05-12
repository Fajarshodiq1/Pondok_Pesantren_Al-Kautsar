<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Models\Jenis_pembayaran;
use App\Models\JenisPembayaran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    
    protected static ?string $navigationGroup = 'Keuangan';

    public static function form(Form $form): Form
    {
        $bulanOptions = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $tahunOptions = [];
        $currentYear = date('Y');
        for ($i = $currentYear - 1; $i <= $currentYear + 1; $i++) {
            $tahunOptions[$i] = $i;
        }

        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->label('Siswa')
                    ->options(Siswa::query()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('jenis_pembayaran_id')
                    ->label('Jenis Pembayaran')
                    ->options(Jenis_pembayaran::query()->where('status', true)->pluck('nama', 'id'))
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $jenisPembayaran = Jenis_pembayaran::find($state);
                            if ($jenisPembayaran) {
                                $set('nominal', $jenisPembayaran->nominal);
                            }
                        }
                    })
                    ->required(),
                Forms\Components\Select::make('bulan')
                    ->options($bulanOptions)
                    ->required(),
                Forms\Components\Select::make('tahun')
                    ->options($tahunOptions)
                    ->default($currentYear)
                    ->required(),
                Forms\Components\TextInput::make('nominal')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected'
                    ])
                    ->default('pending')
                    ->required(),
                Forms\Components\FileUpload::make('bukti_pembayaran')
                    ->directory('bukti-pembayaran')
                    ->image()
                    ->maxSize(2048),
                Forms\Components\Textarea::make('keterangan')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('tanggal_pembayaran'),
                Forms\Components\DateTimePicker::make('tanggal_approval'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenisPembayaran.nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_bulan')
                    ->label('Bulan')
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderBy('bulan', $direction);
                    }),
                Tables\Columns\TextColumn::make('tahun')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nominal')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
                Tables\Columns\TextColumn::make('tanggal_pembayaran')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_approval')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
                Tables\Filters\SelectFilter::make('bulan')
                    ->options([
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ]),
                Tables\Filters\SelectFilter::make('tahun')
                    ->options(function () {
                        $tahunOptions = [];
                        $currentYear = date('Y');
                        for ($i = $currentYear - 1; $i <= $currentYear + 1; $i++) {
                            $tahunOptions[$i] = $i;
                        }
                        return $tahunOptions;
                    }),
                Tables\Filters\SelectFilter::make('jenis_pembayaran_id')
                    ->relationship('jenisPembayaran', 'nama'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('approve')
                    ->action(function (Pembayaran $record) {
                        $record->update([
                            'status' => 'approved',
                            'tanggal_approval' => now(),
                        ]);
                    })
                    ->visible(fn (Pembayaran $record) => $record->status === 'pending')
                    ->color('success')
                    ->icon('heroicon-o-check'),
                Tables\Actions\Action::make('reject')
                    ->action(function (Pembayaran $record) {
                        $record->update([
                            'status' => 'rejected',
                            'tanggal_approval' => now(),
                        ]);
                    })
                    ->visible(fn (Pembayaran $record) => $record->status === 'pending')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('approveBulk')
                        ->label('Approve Selected')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                if ($record->status === 'pending') {
                                    $record->update([
                                        'status' => 'approved',
                                        'tanggal_approval' => now(),
                                    ]);
                                }
                            }
                        })
                        ->color('success')
                        ->icon('heroicon-o-check')
                        ->requiresConfirmation(),
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}