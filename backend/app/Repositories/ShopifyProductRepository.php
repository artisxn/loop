<?php

namespace App\Repositories;

use App\Interfaces\IShopifyRepository;
use Log;

class ShopifyProductRepository extends ShopifyBaseRepository implements IShopifyRepository
{
    public function get($params)
    {
        return $this->shopify->rest('GET', '/admin/products.json', $params);
    }

    public function find($id)
    {
        return $this->shopify->rest('GET', "/admin/products/$id.json")['body']['product'];
    }

    public function returnData($response)
    {
        return $response['body']['products'];
    }
}
