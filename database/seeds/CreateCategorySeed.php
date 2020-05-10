<?php

use Illuminate\Database\Seeder;
use App\category;

class CreateCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(category::class, 15)->create();
    }
}
