<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Companies;

abstract class CompaniesService
{
    public static function paginate($search) 
    {
        $query = Companies::select(['id', 'name', 'address', 'description']);

        if ($search) {
            $query->orWhere('name', 'like', '%' . $search . '%');
            $query->orWhere('address', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
        }

        return $query;
    }
}