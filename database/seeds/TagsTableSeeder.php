<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
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
        factory(Tag::class, 20)->create();
    }
}
