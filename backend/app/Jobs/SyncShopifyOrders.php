<?php

namespace App\Jobs;

use App\Managers\ShopifySyncOrdersManager;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncShopifyOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $link;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ShopifySyncOrdersManager $syncManager)
    {
        $nextLink = $syncManager->syncPaginated($this->link);

        if ($nextLink) {
            self::dispatch($nextLink)->delay(now()->addSeconds(10));
        }
    }
}
