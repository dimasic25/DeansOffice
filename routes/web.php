<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
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

Route::redirect('/', 'groups');

Route::resource('groups', GroupsController::class);

Route::resource('students', StudentsController::class);

//Route::resource('subjects', SubjectsController::class);

Route::prefix('groups/{group}')->group(function () {
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');

    Route::post('/students', [StudentsController::class, 'store'])->name('students.store');

    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');

    //Route::get('/students/{student}', [StudentsController::class, 'show']);

    Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');

    Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
});

Route::get('subjects/sort', [DataController::class, 'sort'])->name('subjects.sort');
