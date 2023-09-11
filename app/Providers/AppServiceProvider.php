<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use App\Models\Client;
use App\Models\ClientCategorie;
use App\Models\Forfait;
use App\Models\Facture;


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
        Schema::defaultStringLength(200);

        route::bind('clientcategorie', function ($id) {
            return ClientCategorie::firstOrFail($id);
        });
        route::bind('forfait', function ($value) {
            return Forfait::findOrFail($value);
        });
        route::bind('facture', function ($value) {
            return Facture::findOrFail($value);
        });
        route::bind('client', function ($value) {
            return Client::findOrFail($value);
        });

    }
}
