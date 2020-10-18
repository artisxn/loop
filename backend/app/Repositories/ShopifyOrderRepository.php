<?php

namespace App\Repositories;

use App\Interfaces\IShopifyRepository;

class ShopifyOrderRepository extends ShopifyBaseRepository implements IShopifyRepository
{
    public function get($params)
    {
        return $this->shopify->Order()->get($params);
    }

    public function find($id)
    {
        return $this->shopify->Order($id)->get();
    }
}
