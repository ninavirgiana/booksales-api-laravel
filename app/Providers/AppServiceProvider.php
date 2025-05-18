<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Untuk mengatasi masalah panjang string di MySQL versi lama
        Schema::defaultStringLength(191);
        
        // Bind interface ke implementasi (jika diperlukan)
        // $this->app->bind(
        //     \App\Contracts\BookRepositoryInterface::class,
        //     \App\Repositories\BookRepository::class
        // );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Konfigurasi timezone
        date_default_timezone_set('Asia/Jakarta');
        
        // Global view composer (jika menggunakan view)
        // View::composer('*', function ($view) {
        //     $view->with('currentUser', auth()->user());
        // });
    }
}