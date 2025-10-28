<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Buat variabel $event dan $header tersedia di semua view
        View::composer('*', function ($view) {
            $selectedEventId = session('selected_event_id');

            // Jika belum ada event terpilih, ambil event terbaru
            if (!$selectedEventId) {
                $latestEvent = Event::latest('year')->first();
                if ($latestEvent) {
                    $selectedEventId = $latestEvent->id;
                    session(['selected_event_id' => $selectedEventId]);
                }
            }

            // Ambil event aktif
            $event = null;
            if ($selectedEventId) {
                $event = Event::find($selectedEventId);
            }

            // Bagikan ke semua view
            $view->with([
                'event' => $event,
            ]);
        });
    }
}
