<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('box_type');
            $table->string('title');
            $table->string('slug');
            $table->string('short_title');
            $table->text('marketing_description');
            $table->integer('calories_kcal');
            $table->float('protein_grams');
            $table->float('fat_grams');
            $table->float('carbs_grams');
            $table->string('bulletpoint1');
            $table->string('bulletpoint2');
            $table->string('bulletpoint3');
            $table->string('recipe_diet_type_id');
            $table->string('season');
            $table->string('base');
            $table->string('protein_source');
            $table->integer('preparation_time_minutes');
            $table->integer('shelf_life_days');
            $table->string('equipment_needed');
            $table->string('origin_country');
            $table->string('recipe_cuisine');
            $table->string('in_your_box');
            $table->integer('gousto_reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
