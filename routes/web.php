<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Teachercontroller;

Route::get('/', function(){
    return redirect('/login');
});

Route::middleware('Auth.check')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('Teacher.check')->group(function () {
    Route::get('/teacher', [Teachercontroller::class, 'index']);
    Route::get('/teacher/create', [Teachercontroller::class, 'create'])->name('teacher.create');
    Route::get('/teacher/store', [Teachercontroller::class, 'store'])->name('teacher.store');
    Route::get('/teacher/edit/{id}', [Teachercontroller::class, 'edit']);
    Route::get('/teacher/update/{id}', [Teachercontroller::class, 'update']);
    Route::get('/teacher/destroy/{id}', [Teachercontroller::class, 'destroy'])->name('teacher.destroy');
    Route::get('/teacher/view/{id}', [Teachercontroller::class, 'show']);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
