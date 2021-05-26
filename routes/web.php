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

//Route::resource('subjects', SubjectsController::class);

Route::prefix('groups/{group}')->group(function () {
    Route::any('/students', [StudentsController::class, 'index'])->name('students.index');

    Route::post('/students', [StudentsController::class, 'store'])->name('students.store');

    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');

    Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');

    Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');

    Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');

    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');

    Route::any('/students/sort/{order}', [StudentsController::class, 'sort'])->name('students.sort');
});

Route::prefix('groups/{group}/students/{student}')->group(function () {
    Route::any('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');

    Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store');

    Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('subjects.create');

    Route::get('/subjects/{subject}', [SubjectsController::class, 'show'])->name('subjects.show');

    Route::put('/subjects/{subject}', [SubjectsController::class, 'update'])->name('subjects.update');

    Route::delete('/subjects/{subject}', [SubjectsController::class, 'destroy'])->name('subjects.destroy');

    Route::get('/subjects/{subject}/edit', [SubjectsController::class, 'edit'])->name('subjects.edit');

    Route::any('/subjects/sort/{order}', [SubjectsController::class, 'sort'])->name('subjects.sort');
});
