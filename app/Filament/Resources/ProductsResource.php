<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Products;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\ProductsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductsResource\RelationManagers;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-in';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('brand')
                    ->options([
                        'adidas' => 'Adidas',
                        'nike' => 'Nike',
                        'fila' => 'Fila',
                        'converse' => 'Converse',
                        'vans' => 'Vans',
                        'new balance' => 'New Balance'
                    ]),
                    Forms\Components\Select::make('kategori')
                    ->options([
                        'sport' => 'Sport',
                        'canvas' => 'Canvas',
                        'sneakers' => 'Sneakers'
                    ])
                    ->required(),
                    Forms\Components\TextInput::make('ukuran')
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('harga')
                        ->numeric()
                        ->required(),
                    Forms\Components\RichEditor::make('deskripsi')
                        ->required(),
                    Forms\Components\FileUpload::make('foto')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('brand')->sortable(),
                Tables\Columns\TextColumn::make('ukuran'),
                Tables\Columns\TextColumn::make('harga'),
                Tables\Columns\ImageColumn::make('foto'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->after(function(Collection $records){
                    foreach($records as $key => $value){
                        if($value->foto){
                            Storage::disk('public')->delete($value->foto);
                        }
                    }
                }),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }    
}
