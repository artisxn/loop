<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        $this->app->singleton(ShopifySDK::class, function ($app) {
            return new ShopifySDK([
                'ShopUrl' => config('shopify.shop_url'),
                'ApiKey' => config('shopify.api_key'),
                'Password' => config('shopify.password'),
            ]);
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
