<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('admin/Student', [StudentController::class, 'index']);
Route::get('admin/courses', [CoursesController::class, 'index']);

Route::get('admin/Student/create', [StudentController::class, 'create']);
Route::post('admin/Student/store', [StudentController::class, 'store']);
Route::get('admin/Student/edit/{id}', [StudentController::class, 'edit']);
Route::put('admin/Student/update/{id}', [StudentController::class, 'update']);
Route::delete('admin/Student/delete/{id}', [StudentController::class, 'destroy']);

Route::get('admin/courses/create', [CoursesController::class, 'create']);
Route::post('admin/courses/store', [CoursesController::class, 'store']);
Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);
Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);
Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
