<?php

use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Models\Hero;

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
    $heroes = Hero::get();
    $skills = Skill::get();
    return view('welcome', compact('heroes'), compact('skills'));
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route User
Route::get('users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
Route::put('users/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
Route::delete('users/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroyUser');

// Route Skill
Route::get('skills/create', [App\Http\Controllers\SkillController::class, 'create'])->name('createSkill');
Route::post('skills/store', [App\Http\Controllers\SkillController::class, 'store'])->name('storeSkill');
Route::get('skills/edit/{id}', [App\Http\Controllers\SkillController::class, 'edit'])->name('editSkill');
Route::put('skills/update/{id}', [App\Http\Controllers\SkillController::class, 'update'])->name('updateSkill');
Route::delete('skills/delete/{id}', [App\Http\Controllers\SkillController::class, 'destroy'])->name('deleteSkill');

// Route Hero
Route::get('heros/create', [App\Http\Controllers\HeroController::class, 'create'])->name('createHero');
Route::post('heros/store', [App\Http\Controllers\HeroController::class, 'store'])->name('storeHero');
Route::get('heros/edit/{id}', [App\Http\Controllers\HeroController::class, 'edit'])->name('editHero');
Route::put('heros/update/{id}', [App\Http\Controllers\HeroController::class, 'update'])->name('updateHero');
Route::delete('heros/delete/{id}', [App\Http\Controllers\HeroController::class, 'destroy'])->name('deleteHero');
