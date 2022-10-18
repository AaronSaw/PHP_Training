<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('/major', MajorController::class);
Route::resource('/student', StudentController::class);

//excel data major import and export
Route::get('/Majorexport', [MajorController::class, 'export'])->name('major.export');
Route::post('/Majorimport', [MajorController::class, 'import'])->name('major.import');

//excel data student import and export
Route::post('/import', [StudentController::class, 'import'])->name('student.import');
Route::get('/export', [StudentController::class, 'export'])->name('student.export');
