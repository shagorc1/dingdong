<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Plans;

abstract class PlansService
{
    public static function paginate($search = '') 
    {
        $query = Plans::select(['id', 'name', 'description', 'price']);

        if ($search !== '') {
            $query->orWhere('name', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
            $query->orWhere('price', 'like', '%' . $search . '%');
        }

        return $query;
    }
}