<?php

namespace App\Transformers;

class RecipesTransformer extends Transformer
{
    public function transform($recipe)
    {
        return [
            'title' => $recipe['title'],
            'slug' => $recipe['slug'],
            'type' => $recipe['box_type'],
            'description' => $recipe['marketing_description'],
            'calories_kcal' => $recipe['calories_kcal'],
            'protein_grams' => $recipe['protein_grams'],
            'fat_grams' => $recipe['fat_grams'],
            'carbs_grams' => $recipe['carbs_grams'],
            'bulletpoint1' => $recipe['bulletpoint1'],
            'bulletpoint2' => $recipe['bulletpoint2'],
            'bulletpoint3' => $recipe['bulletpoint3'],
            'diet_type' => $recipe['recipe_diet_type_id'],
            'season' => $recipe['season'],
            'base' => $recipe['base'],
            'protein_source' => $recipe['protein_source'],
            'preparation_time_minutes' => $recipe['preparation_time_minutes'],
            'shelf_life_days' => $recipe['shelf_life_days'],
            'equipment_needed' => $recipe['equipment_needed'],
            'origin_country' => $recipe['origin_country'],
            'recipe_cuisine' => $recipe['recipe_cuisine'],
            'in_your_box' => $recipe['in_your_box'],
        ];
    }
}