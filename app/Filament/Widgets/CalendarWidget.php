<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public function fetchEvents(array $fetchInfo): array
    {
        return Event::query()
            ->get()
            ->map(
                fn (Event $event) => [
                    'id'=>$event->id,
                    'title' => $event->title,
                    'location' => $event->location,
                    'description' => $event->description,
                    'image' => $event->image,
                    'start' => $event->start,
                    'end' => $event->end,
                    'backgroundColor'=>'blue',
                    'borderColor'=>'blue'
                ]
            )
            ->all();
    }


    public Model | string | null $model = Event::class;

    protected function headerActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function modalActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function viewAction(): Action
    {
        return Actions\ViewAction::make();
    }


    public function getFormSchema(): array
    {
        return [
            Grid::make()
                ->schema([
                    TextInput::make('title')->required(),
                    TextInput::make('location')->required(),
                ]),
            Textarea::make('description')->required(),
            FileUpload::make('image')->nullable(),
            Grid::make()
                ->schema([
                    DateTimePicker::make('start')->required(),
                    DateTimePicker::make('end')->required(),
                ]),
        ];
    }

    public static function canView(): bool
    {
        return false;
    }
}
