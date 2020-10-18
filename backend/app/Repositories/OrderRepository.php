<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Models\Order;

class OrderRepository implements IRepository
{
    public function getAll()
    {
        return Order::all();
    }

    public function find($id)
    {
        return Order::query()->find($id);
    }

    public function updateOrCreate($attributes, $data)
    {
        return Order::query()->updateOrCreate($attributes, $data);
    }

    public function mostRecent()
    {
        return Order::query()->latest('updated_at')->first();
    }
}
