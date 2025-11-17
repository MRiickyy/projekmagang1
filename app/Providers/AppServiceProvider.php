<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Event;
use Carbon\Carbon;

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

            // Jika route prefix dimulai dengan "admin"
            if (request()->is('admin/*')) {
                $selectedEventId = session('selected_event_id');
                $event = $selectedEventId ? Event::find($selectedEventId) : null;
            } else {
                $route = request()->route();
                $eventName = $route?->parameter('event_name');
                $eventYear = $route?->parameter('event_year');

                if ($eventName && $eventYear) {
                    $event = Event::where('name', str_replace('-', ' ', $eventName))
                        ->where('year', $eventYear)
                        ->first();
                } else {
                    // fallback
                    $event = Event::where('name', 'SAIN IJAIN')
                        ->where('year', 2025)
                        ->first();
                }
            }

            // countdown
            $timeLeft = null;

            if ($event && $event->event_time) {
                try {
                    $target = Carbon::parse($event->event_time);
                    $now = Carbon::now();
                    $diff = $target->diff($now);

                    $timeLeft = [
                        'DAYS' => $diff->days,
                        'HOURS' => $diff->h,
                        'MINUTES' => $diff->i,
                        'SECONDS' => $diff->s,
                    ];
                } catch (\Exception $e) {
                    $timeLeft = null;
                }
            }

            // Kirim daftar event untuk dropdown
            $eventsList = Event::orderBy('year', 'desc')->get();

            $view->with(compact('event', 'timeLeft', 'eventsList'));
        });
    }
}
