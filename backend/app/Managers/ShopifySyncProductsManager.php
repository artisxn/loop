<?php

namespace App\Managers;

use App\Interfaces\IShopifySyncManager;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;
use App\Repositories\ShopifyProductRepository;

class ShopifySyncProductsManager extends ShopifyBaseSyncManager implements IShopifySyncManager
{
    /**
     * Product Variant Repository
     *
     * @var ProductVariantRepository
     */
    protected $productVariantRepository;

    public function __construct(ShopifyProductRepository $shopifyRepository, ProductRepository $repository, ProductVariantRepository $productVariantRepository)
    {
        $this->shopifyRepository = $shopifyRepository;
        $this->repository = $repository;
        $this->productVariantRepository = $productVariantRepository;
    }

    public function createLocally($products)
    {
        foreach ($products as $product) {
            $shopifyProductId = $product['id'];

            $this->repository->updateOrCreate(
                ['id' => $shopifyProductId],
                [
                    'id' => $shopifyProductId,
                    'title' => $product['title'],
                    'image' => isset($product['image']) && isset($product['image']) ? $product['image']['src'] : null,
                    'created_at' => $product['created_at'],
                    'updated_at' => $product['updated_at'],
                ]
            );

            foreach (($product['variants'] ?? []) as $variant) {
                $attributes = [
                    'id' => $variant['id'],
                    'product_id' => $shopifyProductId,
                ];
                $data = [
                    'id' => $variant['id'],
                    'product_id' => $shopifyProductId,
                    'title' => $variant['title'],
                    'quantity' => $variant['inventory_quantity'],
                    'price' => $variant['price'],
                    'created_at' => $variant['created_at'],
                    'updated_at' => $variant['updated_at'],
                ];

                $this->productVariantRepository->updateOrCreate($attributes, $data);
            }
        }
    }
}
