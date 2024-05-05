<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::post('/importStudent', [StudentController::class,'importStudent'])->name('importStudent');
Route::post('/importCourse', [StudentController::class,'importCourse'])->name('importCourse');
Route::post('/importTerm', [StudentController::class,'importTerm'])->name('importTerm');
Route::post('/importStudentTerm', [StudentController::class,'importStudentTerm'])->name('importStudentTerm');
Route::post('/importStudentTermCourse', [StudentController::class,'importStudentTermCourse'])->name('importStudentTermCourse');