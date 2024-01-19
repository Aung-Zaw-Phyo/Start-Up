<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'adminPosts' => Tab::make('Admin Posts')
                ->modifyQueryUsing(fn (Builder $query) => $query->adminPosts()),
            'userPosts' => Tab::make('User Posts')
                ->modifyQueryUsing(fn (Builder $query) => $query->userPosts()),
            'allPosts' => Tab::make('All Posts'),
        ];
    }
}
