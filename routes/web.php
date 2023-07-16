<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\CategoryController;
use App\Models\Book;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['perfix'=>'admin','middleware'=>['auth','superAdmin']],function () {


    Route::resource("managers", App\Http\Controllers\ManagerController::class); 
    Route::resource('category', CategoryController::class);
    Route::resource('book', BookController::class);

    Route::resource("managers", App\Http\Controllers\ManagerController::class);
});


Route::controller('App\Http\Controllers\AuthorController')->middleware(['auth','superAdmin'])->prefix('authors')->group(function(){
    Route::get('create','create')->name('author.create');
    Route::post('store','store')->name('author.store');
    Route::get('index','index')->name('author.index');
    Route::get('{id}/edit','edit')->name('author.edit');
    Route::put('update/{id}','update')->name('author.update');
    Route::delete('destroy/{id}','destroy')->name('author.destroy');
});

Route::get('dash-board', function() {
    return view('dash');
})->middleware(['auth', 'superAdmin']);

// Route::get('/frontcategory', [App\Http\Controllers\front\FrontController::class, 'frontCategory']);
Route::get('/categories/{category}', [App\Http\Controllers\front\FrontController::class, 'showBooksInCategory']);
Route::get('/categories', [App\Http\Controllers\front\FrontController::class, 'frontCategory']);

Route::get('/authors', [App\Http\Controllers\front\FrontController::class,'frontAuthor'])->name('author.front');
Route::get('/authors', [App\Http\Controllers\front\FrontController::class,'frontAuthor'])->name('author.front');
Route::get('booksList', [App\Http\Controllers\front\FrontController::class, 'search'])->name('search');
