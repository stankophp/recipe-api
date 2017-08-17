<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RecipeCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'calories_kcal' => 'required',
            'protein_grams' => 'required',
            'fat_grams' => 'required',
            'carbs_grams' => 'required',
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        return [
            'box_type' => $this->box_type,
            'title' => $this->title,
            'slug' => str_slug($this->title),
            'short_title' => $this->short_title,
            'marketing_description' => $this->marketing_description,
            'calories_kcal' => $this->calories_kcal,
            'protein_grams' => $this->protein_grams,
            'fat_grams' => $this->fat_grams,
            'carbs_grams' => $this->carbs_grams,
            'bulletpoint1' => $this->bulletpoint1,
            'bulletpoint2' => $this->bulletpoint2,
            'bulletpoint3' => $this->bulletpoint3,
            'recipe_diet_type_id' => $this->recipe_diet_type_id,
            'season' => $this->season,
            'base' => $this->base,
            'protein_source' => $this->protein_source,
            'preparation_time_minutes' => $this->preparation_time_minutes,
            'shelf_life_days' => $this->shelf_life_days,
            'equipment_needed' => $this->equipment_needed,
            'origin_country' => $this->origin_country,
            'recipe_cuisine' => $this->recipe_cuisine,
            'in_your_box' => $this->in_your_box,
            'gousto_reference' => $this->gousto_reference,
        ];
    }
}