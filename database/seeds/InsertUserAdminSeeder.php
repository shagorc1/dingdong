<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Roles;
use App\User;

class InsertUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Roles::where('name', 'Admin')->first();
        
        User::create([
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'telephone'=> '5555-5555',
            'password' => Hash::make(12345678),
            'role_id' => $role->id,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
