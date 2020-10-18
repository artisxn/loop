<?php

namespace App\Managers;

use App\Interfaces\IShopifySyncManager;
use App\Repositories\LineItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ShopifyOrderRepository;

class ShopifySyncOrdersManager extends ShopifyBaseSyncManager implements IShopifySyncManager
{
    /**
     * Line Item Repository
     *
     * @var LineItemRepository
     */
    protected $lineItemRepository;

    public function __construct(ShopifyOrderRepository $shopifyRepository, OrderRepository $repository, LineItemRepository $lineItemRepository)
    {
        $this->shopifyRepository = $shopifyRepository;
        $this->repository = $repository;
        $this->lineItemRepository = $lineItemRepository;
    }

    public function createLocally($orders)
    {
        foreach ($orders as $order) {
            $shopifyOrderId = $order['id'];

            $this->repository->updateOrCreate(
                ['id' => $shopifyOrderId,],
                [
                    'id' => $shopifyOrderId,
                    'created_at' => $order['created_at'],
                    'updated_at' => $order['updated_at'],
                ]
            );

            foreach (($order['line_items'] ?? []) as $lineItem) {
                $attributes = [
                    'product_id' => $lineItem['product_id'],
                    'order_id' => $shopifyOrderId,
                ];
                $data = [
                    'id' => $lineItem['id'],
                    'product_id' => $lineItem['product_id'],
                    'order_id' => $shopifyOrderId,
                    'quantity' => $lineItem['quantity'],
                    'gift_card' => $lineItem['gift_card'],
                    'price' => $lineItem['price'],
                    'total_discount' => $lineItem['total_discount'],
                ];

                $this->lineItemRepository->updateOrCreate($attributes, $data);
            }
        }
    }
}
