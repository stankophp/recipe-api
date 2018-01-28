<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use Laracasts\TestDummy\Factory;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        //TestDummy::times(20)->create('App\Recipe');
        factory(App\Recipe::class, 20)->create();

        //Factory::times(3)->create('Recipe');
/*
        DB::table('recipes')->insert([
            'title' => 'Perfect pancakes',
            'body' => 'Ingredients

100g plain flour
2 egg
Eggs

300ml semi-skimmed milk
1 tbsp sunflower oil
Sunflower oil

or vegetable, plus extra for frying
pinch salt
',
            'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        ]);

        DB::table('recipes')->insert([
            'title' => 'Easy pancakes',
            'body' => 'Ingredients

100g plain flour
2 egg
Eggs

300ml semi-skimmed milk
1 tbsp sunflower oil
Sunflower oil

or vegetable, plus extra for frying
pinch salt
',
            'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        ]);

        DB::table('recipes')->insert([
            'title' => 'Fluffy American pancakes',
            'body' => 'Ingredients

100g plain flour
2 egg
Eggs

300ml semi-skimmed milk
1 tbsp sunflower oil
Sunflower oil

or vegetable, plus extra for frying
pinch salt
',
            'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        ]);
*/
    }
}
