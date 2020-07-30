<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\User;

abstract class ClientsService
{
    public static function paginate($search) 
    {
        $query = User::select(['id', 'name', 'last_name', 'telephone', 'email']);
   
        if ($search) {
            $query->orWhere(function($subquery) use ($search) {
                $subquery->where('name', 'like', '%' . $search . '%')->where('role_id', 3)->where('active', 1);
            });
            $query->orWhere(function($subquery) use ($search) {
                $subquery->where('last_name', 'like', '%' . $search . '%')->where('role_id', 3)->where('active', 1);
            });
            $query->orWhere(function($subquery) use ($search) {
                $subquery->where('email', 'like', '%' . $search . '%')->where('role_id', 3)->where('active', 1);
            });
            $query->orWhere(function($subquery) use ($search) {
                $subquery->where('telephone', 'like', '%' . $search . '%')->where('role_id', 3)->where('active', 1);
            });
        }

        $query->where('role_id', 3);
        $query->where('active', 1);

        return $query;
    }
}