<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AllUsers;
use App\Livewire\Chat\Main;
use App\Livewire\HomeComponent;
use App\Livewire\PostComponent;
use App\Livewire\SinglePost;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/create-posts', PostComponent::class)->name('create-post');
Route::get('/home', HomeComponent::class)->name('home');
Route::get('/home/post/{id}', SinglePost::class)->name('single-post');
Route::get('/users', AllUsers::class)->name('all-users');
Route::get('/chat/{key?}', Main::class)->name('chat');
