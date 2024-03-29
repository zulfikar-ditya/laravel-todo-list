<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoCotrol;
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
    return view('index');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::get('todo/', [todoCotrol::class, 'index']);

    Route::get('add-todo/', [todoCotrol::class, 'addTodoView'])->name('add');
    Route::post('add-todo/', [todoCotrol::class, 'addTodoFucn']);

    Route::get('my-todo/', [todoCotrol::class, 'MyTodo'])->name('list');

    Route::get('delete/{id}/', [todoCotrol::class, 'deleteTodo']);
});