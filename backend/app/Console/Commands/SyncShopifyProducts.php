<?php

namespace App\Console\Commands;

use App\Managers\ShopifySyncProductsManager;
use Illuminate\Console\Command;

class SyncShopifyProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:sync-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Shopify products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ShopifySyncProductsManager $syncManager)
    {
        $syncManager->sync();

        return 0;
    }
}
