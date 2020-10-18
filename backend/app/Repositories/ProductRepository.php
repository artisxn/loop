<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Models\Product;

class ProductRepository implements IRepository
{
    public function getAll()
    {
        return Product::all();
    }

    public function paginate()
    {
        return Product::simplePaginate();
    }

    public function find($id)
    {
        return Product::query()->find($id);
    }

    public function updateOrCreate($attributes, $data)
    {
        return Product::query()->updateOrCreate($attributes, $data);
    }

    public function mostRecent()
    {
        return Product::query()->latest('updated_at')->first();
    }
}
