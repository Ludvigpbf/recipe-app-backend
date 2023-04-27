<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;
use App\Models\UserList;

class RecipeController extends Controller
{

    public function addRecipeToList(Request $request)
    {

        $recipeId = $request->input('recipe_id');
        $listId = $request->input('list_id');

        $recipe = Recipe::find($recipeId);
        $list = UserList::find($listId);

        $list->recipes()->attach($recipe);

        return response()->json(['message' => 'Recipe added to list successfully'], 200);
    }



}
