<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     * Utilizando o padrão singleton é possivel ter apenas uma instância de uma classe.
     */
    public function register()
    {
        $this->app->singleton('GuzzleHttp\Client', function(){
          return new Client([
            'base_uri' => 'https://api.punkapi.com/v2/beers',
          ]);
        });
    }
}
