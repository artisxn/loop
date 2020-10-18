<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Models\LineItem;

class LineItemRepository implements IRepository
{
    public function getAll()
    {
        return LineItem::all();
    }

    public function find($id)
    {
        return LineItem::query()->find($id);
    }

    public function updateOrCreate($attributes, $data)
    {
        return LineItem::query()->updateOrCreate($attributes, $data);
    }

    public function mostRecent()
    {
        return LineItem::query()->latest('updated_at')->first();
    }
}
