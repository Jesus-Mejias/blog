<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // (|:
        // ]: Ejecuta el factory
        factory(Category::class, 20)->create();
    }
}
