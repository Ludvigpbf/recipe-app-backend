<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserList;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{
    /* public function showLists($id)
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
    } */

   /*  public function createList(Request $request)
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
    } */

    public function __construct()
{
    $this->middleware('auth');
}

    // Create a new list for the logged-in user
    public function createList(Request $request)
    {
       // Check if user is authenticated
       if (Auth::check()) {
        $user = Auth::user();
        $list = new UserList([
            'title' => $request->input('title'),
        ]);
        $user->lists()->save($list);
        $user->lists()->attach($list->id, ['user_id' => $user->id]);
        return redirect()->back()->with('success', 'List created successfully');
    } else {
        // User is not logged in, handle the error
        // For example, you can redirect to a login page or return an error response
        return redirect()->route('login');
    }
    }

    // Add a recipe to a list for the logged-in user
    public function addRecipeToList(Request $request)
    {
        $user = Auth::user();
        $list = UserList::find($request->input('list_id'));
        $list->recipes()->attach($request->input('recipe_id'), ['user_id' => $user->id]);
        return redirect()->back()->with('success', 'Recipe added to list successfully');
    }

    // Save changes to a list for the logged-in user
    public function saveList(Request $request)
    {
        $user = Auth::user();
        $list = UserList::find($request->input('list_id'));
        $list->title = $request->input('title');
        $list->save();
        return redirect()->back()->with('success', 'List saved successfully');
    }

}
