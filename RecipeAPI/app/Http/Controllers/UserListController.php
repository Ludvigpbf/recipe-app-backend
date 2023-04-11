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
        $user->lists()->save($list);
        return redirect()->back()->with('success', 'List created successfully');
    } else {
        return redirect()->route('login');
    }
    }

  
    public function addRecipeToList(Request $request)
    {
        $user = Auth::user();
        $list = UserList::find($request->input('list_id'));
        $list->recipes()->attach($request->input('recipe_id'), ['user_id' => $user->id]);
        return redirect()->back()->with('success', 'Recipe added to list successfully');
    }


    public function saveList(Request $request)
    {
        $user = Auth::user();
        $list = UserList::find($request->input('list_id'));
        $list->title = $request->input('title');
        $list->save();
        return redirect()->back()->with('success', 'List saved successfully');
    }

}
