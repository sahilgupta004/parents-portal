<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\EnrollController;


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

 
Route::resource('students', StudentController::class)->except(['destroy']);
Route::get('student/delete/{id}', [StudentController::class, 'destroy'])->name('students.delete');

Route::resource('class-rooms', ClassRoomController::class)->except(['destroy']);
Route::get('class-rooms/delete/{id}', [ClassRoomController::class, 'destroy'])->name('class-rooms.delete');
Route::get('enroll/{student}', [EnrollController::class, 'create'])->name('enroll.student');
Route::post('enroll-student', [EnrollController::class, 'store'])->name('enroll.studentclass');
Route::get('unenroll/{student}', [EnrollController::class, 'destroy'])->name('unenroll.student');
