<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->middleware(['auth'])
->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('store');

    Route::get('{category}/edit', 'edit')->name('edit');
    Route::put('{category}', 'update')->name('update');

    Route::delete('destroy/{category}', 'destroy')->name('destroy');
});

Route::controller(TagController::class)->prefix('tags')->name('tags.')->middleware(['auth'])
->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('store');

    Route::get('{tag}/edit', 'edit')->name('edit');
    Route::put('{tag}', 'update')->name('update');

    Route::delete('destroy/{tag}', 'destroy')->name('destroy');
});

Route::controller(ArticleController::class)->prefix('articles')->name('articles.')->middleware(['auth'])
->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('store');

    Route::get('{article}/edit', 'edit')->name('edit');
    Route::put('{article}', 'update')->name('update');

    Route::delete('destroy/{article}', 'destroy')->name('destroy');
});




Route::middleware('auth')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
