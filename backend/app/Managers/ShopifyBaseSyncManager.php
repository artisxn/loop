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

    public function syncPaginated($link)
    {
        $response = $this->getPaginatedFromShopify($link);
        $this->createLocally($this->shopifyRepository->returnData($response));

        return !is_null($response['link']) ? $response['link']['next'] : null;
    }

    public function getPaginatedFromShopify($link)
    {
        return $this->shopifyRepository->getPaginated($link);
    }

    abstract public function createLocally($array);
}
