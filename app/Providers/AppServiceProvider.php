<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // NECESSÀRIO PARA O laravel entender que o interface tem uma instancia do repository
        $this->app->bind(
            \App\Repositories\Contracts\TransacaoInterface::class,
            \App\Repositories\Eloquent\TransacaoRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
