<?php

namespace App\Providers;

use App\Services\Dadata\OrganizationApi;
use Illuminate\Support\ServiceProvider;

class DadataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(OrganizationApi::class, function () {
            $config = config('updater');
            $dadata = $config['dadata'];
            return new OrganizationApi(
                $dadata['url_organization'],
                $dadata['api_key'],
                $dadata['secret_key']
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
