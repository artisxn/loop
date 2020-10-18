<?php

namespace App\Repositories;

use App\Interfaces\IShopifyRepository;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use PHPShopify\ShopifySDK;

abstract class ShopifyBaseRepository implements IShopifyRepository
{
    /**
     * Shopify SDK Instance
     *
     * @var BasicShopifyAPI
     */
    protected $shopify;

    public function __construct(BasicShopifyAPI $shopify) {
        $this->shopify = $shopify;
    }

    abstract public function get($params);

    abstract public function find($id);

    public function getAll()
    {
        return $this->returnData($this->get(null));
    }

    public function getPaginated(string $link = null, int $limit = 100)
    {
        return $this->get([
            'limit' => $limit,
            'page_info' => $link,
        ]);
    }
}
