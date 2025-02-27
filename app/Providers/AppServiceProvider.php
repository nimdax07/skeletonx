<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // 🛠️ Tambahkan ini supaya View bisa digunakan!

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
        // 🔥 Biar semua view pakai template AdminLTE
        View::share('layout', 'adminlte::page');
    }
}
