<?php

use App\Http\Controllers\CardsController;
use App\Http\Controllers\categoriesContrller;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;



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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'login');
Route::view('/table', 'cards.table');

// cards
Route::get('/cards', [CardsController::class, 'tags']);
Route::get('/show', [CardsController::class, 'index']);
Route::post('/addCard', [CardsController::class, 'add_Card']);
Route::get('/editCard/{id}', [CardsController::class, 'edit']);
Route::get('/deleteCard/{id}', [CardsController::class, 'delete']);
Route::post('/update_card', [CardsController::class, 'update']);
Route::get('/filter_cards/{id}', [CardsController::class, 'filter']);




// tag
Route::get('/tags', [TagsController::class, 'index']);
Route::post('/addTag', [TagsController::class, 'add_Tag']);
Route::get('/editTag/{id}', [TagsController::class, 'showData']);
Route::post('/addTag', [TagsController::class, 'add_Tag']);
Route::post('/updateTag', [TagsController::class, 'update']);


// categories
Route::get('/list_db', [categoriesContrller::class, 'index']);
Route::post('/CreateCategory', [categoriesContrller::class, 'create_db']);
Route::view('/create_db', 'create_category');
Route::get('active/{id}', [categoriesContrller::class, 'active']);



