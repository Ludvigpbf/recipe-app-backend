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
        $recipeId = $request->input('recipe_id');
    
        // Check if recipe already exists in the list
        if (!$list->recipes->contains($recipeId)) {
            $list->recipes()->attach($recipeId, ['user_id' => $user->id]);
            return response()->json(['message' => 'Recipe added to list successfully'], 200);
        } else {
            return response()->json(['message' => 'Recipe already exists in the list'], 200);
        }
    }


    /* public function editList(Request $request)
    {
        $user = Auth::user();
        $list = UserList::find($request->input('list_id'));
        $list->title = $request->input('title');
        $list->save();
        return redirect()->back()->with('success', 'List updated successfully');
    } */
    public function editList(Request $request)
{
    $user = Auth::user();
    $listId = $request->input('listId');
    $newTitle = $request->input('newListTitle');

    // Validate list ID and title
    if (!$listId || !$newTitle) {
        return response()->json(['error' => 'Invalid data'], 400);
    }

    // Find list by ID
    $list = UserList::find($listId);

    // Check if list exists
    if (!$list) {
        return response()->json(['error' => 'List not found'], 404);
    }

    // Update list title
    $list->title = $newTitle;
    $list->save();

    return response()->json(['message' => 'List updated successfully']);
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
