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

    public function __construct()
{
    $this->middleware('auth');
}

    
    public function createList(Request $request)
    {
      
       if (Auth::check()) {
        $user = Auth::user();
        $list = new UserList([
            'title' => $request->input('title'),
        ]);
        $user->userLists()->save($list);
        return response()->json(['message' => 'List created successfully'], 200);
    }
    }

  
    public function addRecipeToList(Request $request)
    {
        $user = Auth::user();
        $list = UserList::find($request->input('list_id'));
        $list->recipes()->attach($request->input('recipe_id'), ['user_id' => $user->id]);
        return redirect()->back()->with('success', 'Recipe added to list successfully');
    }


    public function editList(Request $request)
    {
        $user = Auth::user();
        $list = UserList::find($request->input('list_id'));
        $list->title = $request->input('title');
        $list->save();
        return redirect()->back()->with('success', 'List updated successfully');
    }

    public function showList(Request $request)
    {
        $user = Auth::user();
        $lists = $user->userLists;
        return response()->json(['lists' => $lists], 200);
    }

    public function getListByTitle($title)
{
    
    $list = UserList::where('title', 'Favourite recipes')->first();

    if (!$list) {
        return response()->json(['message' => 'List not found'], 404);
    }

    return response()->json(['list' => $list], 200);
}

}
