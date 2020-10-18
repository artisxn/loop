<?php

namespace App\Interfaces;

interface IShopifyRepository extends IReadOnlyRepository
{
    public function get($params);

    public function getLimitedAmount(int $limit = 50);

    public function getSinceId($id);
}
