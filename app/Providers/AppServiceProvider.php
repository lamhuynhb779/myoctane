<?php

namespace App\Providers;

use App\Services\MyService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Laravel\Octane\Facades\Octane;

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
        $pid = getmypid();
        Log::info("Worker PID: $pid");

        //
        App::singleton('MyService', function () {
            return new MyService();
        });

//        Octane::tick('keep-myservice', function () {
//            if (!App::bound('MyService')) {
//                App::singleton('MyService', function () {
//                    return new MyService();
//                });
//            }
//        });
    }
}
