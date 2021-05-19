<?php

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

Route::resource('subjects', SubjectsController::class);
