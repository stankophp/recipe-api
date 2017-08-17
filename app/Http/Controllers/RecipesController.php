<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeCreateRequest;
use App\Http\Requests\RecipeUpdateRequest;
use App\Recipe;
use App\Transformers\RecipesTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class RecipesController extends ApiController
{
    protected $recipesTransformer;

    public function __construct(RecipesTransformer $recipesTransformer)
    {
        $this->recipesTransformer = $recipesTransformer;

        $this->beforeFilter('auth.basic');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  string $type
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $limit = Input::get('limit') ? : 10;
        // don't allow more than 20 per page
        if ($limit > 20) {
            $limit = 20;
        }
        if (!empty($type)) {
            $recipes = Recipe::where('recipe_cuisine', $type)->paginate($limit);
        }
        else {
            $recipes = Recipe::paginate($limit);
        }

        return Response::json([
            'data' => $this->recipesTransformer->transformCollection($recipes)
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecipeCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeCreateRequest $request)
    {
        $recipe = Recipe::create($request->postFillData());

        return $this->respondCreated('Recipe created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return $this->respondNotFound('Recipe not found');
        }

        return Response::json([
            'data' => $this->recipesTransformer->transform($recipe->toArray())
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RecipeUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeUpdateRequest $request, $id)
    {
        /* @var Recipe $post */
        $recipe = Recipe::findOrFail($id);
        $recipe->fill($request->postFillData());
        $recipe->save();

        return $this->respondUpdated('Recipe updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $rating
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStarRating($rating, $id)
    {
        if ($rating < 1 || $rating > 5) {
            return $this->respondFailedValidation('Star rating needs to be between 1 and 5');
        }
        
        $rating = round($rating, 0);
        /* @var Recipe $post */
        $recipe = Recipe::findOrFail($id);
        $recipe->star_rating = $rating;
        $recipe->save();

        return $this->respondUpdated('Recipe updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
