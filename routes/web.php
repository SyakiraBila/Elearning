<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);
Route::get('admin/Student', [StudentController::class, 'index']);

