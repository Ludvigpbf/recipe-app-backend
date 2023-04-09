<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;
use App\Models\UserList;

class RecipeController extends Controller
{
    public function recipes()
    {
        $recipes = Recipe::get();
        $lists = UserList::get();

        return view('search-recipe', ['recipes' => $recipes, 'lists' => $lists]);
    }

    public function recipesIndex()
    {
        $recipes = Recipe::get();

        return view('search-recipe', ['recipes' => $recipes]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOne($id)
    {
        //
        $recipe = Recipe::find($id);
        $reviews = Review::whereHas('recipes', function ($query) use ($id) {
            $query->where('id', $id)->where('approved', 1);
        })->get();
        return view('list-details/{id}', compact('recipe', 'reviews'));
    }

    public function showOneItem($id)
    {
        //
        $recipe = Recipes::find($id);
        $reviews = Review::whereHas('recipes', function ($query) use ($id) {
            $query->where('id', $id)->where('approved', 1);
        })->get();
        return view('list-details/{id}', compact('recipe', 'reviews'));
    }

}
