<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', function () {
    return view('auth.login');
});
