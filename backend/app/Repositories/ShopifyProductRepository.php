<?php

namespace App\Repositories;

use App\Interfaces\IShopifyRepository;
use Log;

class ShopifyProductRepository extends ShopifyBaseRepository implements IShopifyRepository
{
    public function get($params)
    {
        return $this->shopify->Product()->get($params);
    }

    public function find($id)
    {
        return $this->shopify->Product($id)->get();
    }
}
