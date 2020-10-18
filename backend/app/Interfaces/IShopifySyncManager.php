<?php

namespace App\Interfaces;

interface IShopifySyncManager
{
    public function sync();

    public function getLatestFromShopify($latest);

    public function getMostRecentLocally();

    public function createLocally($array);
}
