<?php

use Illuminate\Database\Seeder;

use App\Models\Categories;

class InsertCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name' => 'Sushi',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Saludable',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Alitas',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Sandwich',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Mexicana',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Pizza',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Hamburguesas',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Postres',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Categories::create([
            'name' => 'Casera',
            'type' => 'compania',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
