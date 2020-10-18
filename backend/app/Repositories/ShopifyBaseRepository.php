<?php

namespace App\Repositories;

use App\Interfaces\IShopifyRepository;
use PHPShopify\ShopifySDK;

abstract class ShopifyBaseRepository implements IShopifyRepository
{
    /**
     * Shopify SDK Instance
     *
     * @var ShopifySDK
     */
    protected $shopify;

    public function __construct(ShopifySDK $shopify) {
        $this->shopify = $shopify;
    }

    abstract public function get($params);

    abstract public function find($id);

    public function getAll()
    {
        return $this->get(null);
    }

    public function getSinceId($id)
    {
        return $this->get(['since_id' => $id]);
    }

    public function getLimitedAmount(int $limit = 50)
    {
        return $this->get([
            'limit' => $limit,
        ]);
    }
}
