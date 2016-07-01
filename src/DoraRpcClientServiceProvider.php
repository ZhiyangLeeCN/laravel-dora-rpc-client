<?php namespace ZhiyangLee\LaravelDoraRpc;

/**
 * User: zhiyanglee
 * Date: 6/25/16
 * Time: 6:22 PM
 */

use DoraRPC\Client;
use Illuminate\Support\ServiceProvider;

class DoraRpcClientServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/doraclient.php' =>  config_path('doraclient.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('DoraRPC\Client', function($app){

            $clientConfig = $app['config']['doraclient.clientConfig'];
            $clientMode = $app['config']['doraclient.clientMode'];

            $doraRpc = new Client($clientConfig);
            $doraRpc->changeMode($clientMode);

            return $doraRpc;

        });
    }
}