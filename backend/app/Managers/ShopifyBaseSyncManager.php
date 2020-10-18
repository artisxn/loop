<?php

namespace App\Managers;

use App\Interfaces\IRepository;
use App\Interfaces\IShopifySyncManager;
use App\Interfaces\IShopifyRepository;

abstract class ShopifyBaseSyncManager implements IShopifySyncManager
{
    /**
     * Shopify Repository
     *
     * @var IShopifyRepository
     */
    protected $shopifyRepository;

    /**
     * Repository
     *
     * @var IRepository
     */
    protected $repository;

    public function sync()
    {
        $array = $this->getLatestFromShopify(null);
        $this->createLocally($array);
    }

    public function syncNew()
    {
        $mostRecent = $this->getMostRecentLocally();
        $array = $this->getLatestFromShopify($mostRecent ? $mostRecent->shopify_id : null);
        $this->createLocally($array);
    }

    public function getMostRecentLocally()
    {
        return $this->repository->getAll();
    }

    public function getLatestFromShopify($latest)
    {
        return $this->shopifyRepository->getSinceId($latest);
    }

    abstract public function createLocally($array);
}
