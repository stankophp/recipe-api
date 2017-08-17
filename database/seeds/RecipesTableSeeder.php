<?php

use App\Recipe;
use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Recipe::truncate();

//        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        factory(Recipe::class, 15)->create();
    }
}
