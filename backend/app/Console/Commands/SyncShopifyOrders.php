<?php

namespace App\Console\Commands;

use App\Jobs\SyncShopifyOrders as SyncShopifyOrdersJob;
use Illuminate\Console\Command;

class SyncShopifyOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopify:sync-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Shopify orders';

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
    public function handle()
    {
        SyncShopifyOrdersJob::dispatch(null);

        return 0;
    }
}
