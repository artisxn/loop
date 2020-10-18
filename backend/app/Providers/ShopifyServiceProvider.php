<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;
use PHPShopify\ShopifySDK;

class ShopifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BasicShopifyAPI::class, function ($app) {
            $options = new Options();
            $options->setType(true);
            $options->setVersion('2020-01');
            $options->setApiKey(config('shopify.api_key'));
            $options->setApiPassword(config('shopify.password'));

            $api = new BasicShopifyAPI($options);
            $api->setSession(new Session(config('shopify.shop_url')));

            return $api;
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
