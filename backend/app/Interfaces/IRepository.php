<?php

namespace App\Interfaces;

interface IRepository extends IReadOnlyRepository
{
    public function updateOrCreate($attributes, $data);

    public function mostRecent();
}
