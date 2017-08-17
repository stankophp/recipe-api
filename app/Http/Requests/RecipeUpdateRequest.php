<?php

namespace App\Http\Requests;

use App\Http\Requests\RecipeCreateRequest;

class RecipeUpdateRequest extends RecipeCreateRequest
{
    //We’re just inherting the authorize() and rules() methods from the RecipeCreateRequest class
}