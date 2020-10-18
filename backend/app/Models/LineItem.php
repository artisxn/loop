<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\LineItem
 */
class LineItem extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'line_items';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
