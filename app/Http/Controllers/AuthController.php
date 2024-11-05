<?php

namespace App\Http\Controllers;

use App\Models\murid;
use App\Models\walas;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request, murid $murid, walas  $walas){
        $request->validate([
            'user_type' => 'required|string|in:murid,teacher'
        ]);
    }
}
