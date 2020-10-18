<?php

namespace App\Interfaces;

interface IReadOnlyRepository
{
    public function getAll();

    public function find($id);
}
