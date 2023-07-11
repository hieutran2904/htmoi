<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;

// admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Models\Movie;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;

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

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{episode}', [IndexController::class, 'watch']);
Route::get('/tap-so', [IndexController::class, 'episode'])->name('tap-so');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tags/{tag}', [IndexController::class, 'tags'])->name('tags');
Route::get('/tim-kiem', [IndexController::class, 'searchFilm'])->name('search-film');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// route admin
Route::resource('category', CategoryController::class);
Route::resource('country', CountryController::class);
Route::resource('genre', GenreController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
Route::get('update-year-film', [MovieController::class, 'updateYearFilm'])->name('update-year-film');
Route::get('update-top-view', [MovieController::class, 'updateTopView'])->name('update-top-view');
Route::get('filter-top-view', [MovieController::class, 'filterTopView'])->name('filter-top-view');
Route::get('update-season', [MovieController::class, 'updateSeason'])->name('update-season');
Route::get('get-episode', [MovieController::class, 'getEpisode'])->name('get-episode');



