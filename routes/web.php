<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TodoController;
use App\Models\Product;

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

Route::get('/', [TodoController::class, 'index']);
Route::post('/todos/create', [TodoController::class, 'store']);
Route::post('/todos/update', [TodoController::class, 'update']);
Route::post('/todos/delete', [TodoController::class, 'destroy']);
//追加
Route::get('/todos/find', [TodoController::class, 'find']);
Route::get('/todos/search', [TodoController::class, 'search']);

//Route::get('/register', function () {return view('welcome');});
Route::get('/register', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


