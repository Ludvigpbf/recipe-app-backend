<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserList;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Redirect;

class UserListController extends Controller
{
    public function showLists($id)
    {
        $users = User::find($id);
        $recipes = Recipe::find($id);
        $lists = UserList::find($id);
        return view('lists', ['users' => $users, 'recipes' => $recipes, 'lists' => $lists]);
    }

    public function showListsRecipes($id)
    {
        $user = User::find($id);
        return view('list')->with('user', $user);
    }

    public function store(Request $request)
    {
        $lists = new UserList;

        $lists->title = $request->title;
        $lists->save();

        return redirect('lists');
    }


    public function update(Request $request, $id)
    {
        $lists = UserList::find($request->id);

        $lists->title = $request->title;
        $lists->save();

        return Redirect::route('lists', $id);
    }

    public function destroy(Request $request)
    {
        $list = UserList::find($request->id);
        $list->delete();
        return view('lists');
    }

    public function showList($id)
    {
        //
        $users = User::find($id);

        $recipes = Recipe::whereHas('users', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        $lists = UserList::whereHas('users', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return view('list-details/{id}', ['users' => $users, 'recipes' => $recipes, 'lists' => $lists,]);
    }


    public function addRecipesToList(Request $request)
    {
        $list = UserList::find($request->list_id);
        $recipes = Recipe::get();
        $lists = UserList::get();

        $list->users()->syncWithoutDetaching($request->user_id);
        $list->recipes()->syncWithoutDetaching($request->recipe_id);
        return view('search-recipe', ['recipes' => $recipes, 'lists' => $lists]);
    }

    public function createList(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string',
        ]);
        $list = UserList::create([
            'title' => $fields['title'],
        ]);
      
        $response = [
            'title' => $list,
        ];

        return response($response, 201);
    }

}
