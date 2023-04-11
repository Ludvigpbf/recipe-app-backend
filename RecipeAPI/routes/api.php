<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Login user
Route::post('login', [AuthController::class, 'login']);
// Register user
Route::post('register', [AuthController::class, 'register']);

// If logged in...
Route::group(['middleware' => 'auth:sanctum'], function() {
    // Logout user
    Route::post('logout', [AuthController::class, 'logout']);
    // Get specific user details
    Route::get('getuser/{id}', [AuthController::class, 'getUser']);
    // Create a list
    Route::post('list', [UserListController::class, 'createList']);
    // Update a list
    Route::post('editList', [UserListController::class, 'editList']);
    // Get user lists
    Route::get('lists', [UserListController::class, 'showList']);
    // Get Favourite recipes list
    Route::get('lists/Favourite%20recipes', [UserListController::class, 'getListByTitle']);
    /* // Get user lists
    Route::get('list-details/{id}', [UserListController::class, 'showList']); */
    // Add recipes to list
    Route::post('recipe-details/{id}', [RecipeController::class, 'addRecipeToList']);


});
