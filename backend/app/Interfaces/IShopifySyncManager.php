<?php

namespace App\Interfaces;

interface IShopifySyncManager
{
    public function syncPaginated($link);

    public function getPaginatedFromShopify($link);

    public function createLocally($array);
}
