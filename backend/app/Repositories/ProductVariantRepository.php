<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Models\ProductVariant;

class ProductVariantRepository implements IRepository
{
    public function getAll()
    {
        return ProductVariant::all();
    }

    public function find($id)
    {
        return ProductVariant::query()->find($id);
    }

    public function updateOrCreate($attributes, $data)
    {
        return ProductVariant::query()->updateOrCreate($attributes, $data);
    }

    public function mostRecent()
    {
        return ProductVariant::query()->latest('updated_at')->first();
    }
}
