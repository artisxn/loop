<?php

namespace App\Interfaces;

interface IShopifyRepository extends IReadOnlyRepository
{
    public function get($params);

    public function getPaginated(string $link = null, int $limit = 100);

    public function returnData($response);
}
