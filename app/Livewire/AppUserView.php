<?php

namespace App\Livewire;

use App\Models\AppUser;
use Filament\Infolists\Components\TextEntry;
use Livewire\Component;
use Illuminate\Http\Request;
use Filament\Infolists\Infolist;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Concerns\InteractsWithInfolists;

class AppUserView extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    public $appUser;

    public $posts;
    
    public function mount(Request $request)
    {
        $id = $request->route('id');
        $appUser = AppUser::findOrFail($id);
        $this->appUser = $appUser;
        $this->posts = $appUser->posts;
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->appUser)
            ->schema([
                Section::make()
                ->columns([
                    'md' => 2,
                ])
                ->schema([
                    TextEntry::make('name'),
                    TextEntry::make('email'),
                    TextEntry::make('country'),
                    TextEntry::make('city'),
                    TextEntry::make('bio'),
                ])
            ]);
    }

    public function render()
    {
        return view('livewire.app-user-view');
    }
}
