<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductsResource;
use App\Models\products;

class EditProducts extends EditRecord
{
    protected static string $resource = ProductsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                //menghapus file yang sudah tersimpan
                function(products $record){
                    if($record->foto){
                        Storage::disk('public')->delete($record->foto);
                    }
                }),
        ];
    }
}
