<?php

namespace App\Filament\Resources\StripeOrderResource\Pages;

use App\Filament\Resources\StripeOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStripeOrders extends ListRecords
{
    protected static string $resource = StripeOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StripeOrderResource\Widgets\OrdersStats::class,
        ];
    }
}
