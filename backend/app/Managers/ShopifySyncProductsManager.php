<?php

namespace App\Managers;

use App\Interfaces\IShopifySyncManager;
use App\Repositories\ProductRepository;
use App\Repositories\ShopifyProductRepository;

class ShopifySyncProductsManager extends ShopifyBaseSyncManager implements IShopifySyncManager
{
    public function __construct(ShopifyProductRepository $shopifyRepository, ProductRepository $repository)
    {
        $this->shopifyRepository = $shopifyRepository;
        $this->repository = $repository;
    }

    public function createLocally($products)
    {
        foreach ($products as $product) {
            $this->repository->updateOrCreate(
                ['id' => $product['id']],
                [
                    'id' => $product['id'],
                    'title' => $product['title'],
                    'image' => isset($product['image']) && isset($product['image']) ? $product['image']['src'] : null,
                    'created_at' => $product['created_at'],
                    'updated_at' => $product['updated_at'],
                ]
            );
        }
    }
}
