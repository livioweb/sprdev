<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class GuzzleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('guzzle', function () {
            $config = [
                'base_uri' =>"https://superodev.herokuapp.com/api/",//env('URL_MAGENTO'),
                'headers' => [ 'Content-Type' => 'application/json' ],
                'timeout'  => 12.0,
                "config"          => [
                    "curl"        => [
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_TIMEOUT_MS => 0,
                        CURLOPT_CONNECTTIMEOUT => 0,
                    ]
                ],
                'http_errors' => true
            ];

            return new Client($config);
        });
    }
}
