<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Categories;

abstract class CategoriesService
{
    public static function paginate($search = '') 
    {
        $query = Categories::select(['id', 'name', 'type']);

        if ($search !== '') {
            $query->orWhere('name', 'like', '%' . $search . '%');
            $query->orWhere('type', 'like', '%' . $search . '%');
        }

        return $query;
    }
}