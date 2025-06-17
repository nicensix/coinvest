<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Responses\LoginResponse as CustomLoginResponse;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::prefix('api')
        ->middleware('api')
        ->group(base_path('routes/api.php'));

    Route::middleware('web')
        ->group(base_path('routes/web.php'));

    
    }
}
