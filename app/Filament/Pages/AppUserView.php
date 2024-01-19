<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class AppUserView extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static bool $shouldRegisterNavigation = false;

    protected static string $view = 'filament.pages.app-user-view';
}
