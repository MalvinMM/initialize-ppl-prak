<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(RecipeController::class)->group(function () {
    Route::get('/', 'index')->name('landing');

    Route::get('/add-recipe', 'addRecipe')->name('add-recipe');
    Route::post('/add-recipe', 'storeRecipe')->name('store-recipe');

    Route::get('/{id}/edit', 'editRecipe')->name('edit-recipe');
    Route::put('/{id}', 'updateRecipe')->name('update-recipe');
    Route::delete('/{id}', 'deleteRecipe')->name('delete-recipe');

    Route::get('/{id}', 'show')->name('show-recipe');
});
