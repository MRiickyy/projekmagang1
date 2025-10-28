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
        View::composer('*', function ($view) {
            // Jika route prefix dimulai dengan "admin", ambil event dari session
            if (request()->is('admin/*')) {
                $selectedEventId = session('selected_event_id');
                $event = $selectedEventId ? Event::find($selectedEventId) : null;
            }
            // Kalau bukan admin (halaman publik), ambil dari parameter URL
            else {
                $route = request()->route();

                $eventName = $route?->parameter('event_name');
                $eventYear = $route?->parameter('event_year');

                if ($eventName && $eventYear) {
                    $event = Event::where('name', $eventName)
                        ->where('year', $eventYear)
                        ->first();
                } else {
                    // fallback ke event default
                    $event = Event::where('name', 'icoict')
                        ->where('year', 2025)
                        ->first();
                }
            }

            $view->with('event', $event);
        });
    }
}
