<?php

namespace App\Repositories;

use App\Interfaces\IShopifyRepository;

class ShopifyOrderRepository extends ShopifyBaseRepository implements IShopifyRepository
{
    public function get($params)
    {
        return $this->shopify->rest('GET', '/admin/orders.json', $params);
    }

    public function find($id)
    {
        return $this->shopify->rest('GET', "/admin/orders/$id.json")['body']['product'];
    }

    public function returnData($response)
    {
        return $response['body']['orders'];
    }
}
