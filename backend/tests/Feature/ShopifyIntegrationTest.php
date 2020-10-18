<?php

namespace Tests\Feature;

use App\Jobs\SyncShopifyOrders;
use App\Jobs\SyncShopifyProducts;
use App\Managers\ShopifySyncOrdersManager;
use App\Managers\ShopifySyncProductsManager;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ShopifyIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Assert that products are retrieved from Shopify and stored in DB
     *
     * @return void
     */
    public function testSyncProductsCommandDispatchesJob()
    {
        Queue::fake();
        Queue::assertNothingPushed();

        $this->artisan('shopify:sync-products')->assertExitCode(0);

        Queue::assertPushed(SyncShopifyProducts::class);
    }

    /**
     * Assert that orders are retrieved from Shopify and stored in DB
     *
     * @return void
     */
    public function testSyncOrdersCommandDispatchesJob()
    {
        Queue::fake();
        Queue::assertNothingPushed();

        $this->artisan('shopify:sync-orders')->assertExitCode(0);

        Queue::assertPushed(SyncShopifyOrders::class);
    }

    public function testProductsSyncedToDatabase()
    {
        $manager = app(ShopifySyncProductsManager::class);
        $manager->syncPaginated(null);
        $this->assertTrue(Product::count() > 0);
    }

    public function OrdersSyncedToDatabase()
    {
        $manager = app(ShopifySyncOrdersManager::class);
        $manager->syncPaginated(null);
        $this->assertTrue(Order::count() > 0);
    }
}
