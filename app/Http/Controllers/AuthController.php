<?php

namespace App\Http\Controllers;

use App\Models\murid;
use App\Models\walas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request, murid $murid, walas $walas){
        $validate = $request->validate([
            'user_type' => 'string|in:murid,walas'
        ]);
        if($request->user_type === 'murid'){
            $request->validate([
                'nis' => 'string',
                'murid_password' => 'string',
            ]);
            return $this->authenticateStudent($request, $murid);
        }else{
            $request->validate([
                'nip' => 'string',
                'teacher_password' => 'string',
            ]);
            return $this->authenticateTeacher($request, $walas);
        }
    }

    private function authenticateStudent(Request $request, murid $murid){
        $siswa = $murid::all();
        foreach($siswa as $data){
            if($data->nis === $request->nis && Hash::check($request->student_password, $data->password)){
                session(['user_type' => 'student', 'id' => $data->id, 'username' => $data->nama_siswa]);
                return redirect()->intended('/student');
            }
        }

        return redirect()->back()->withInput()->withErrors([
            'message' => 'nis atau password siswa salah.'
        ]);
    }

    private function authenticateTeacher(Request $request, walas $walas){
        $gurus = $walas::all();
        foreach($gurus as $guru){
            if($guru->nip === $request->nip && Hash::check($request->walas_password, $guru->password)){
                session(['user_type' => 'student', 'id' => $guru->id, 'username' => $guru->nama_walas]);
                return redirect()->intended('/teacher');
            }
        }

        return redirect()->back()->withInput()->withErrors([
            'message' => 'nis atau password guru salah.'
        ]);
    }
}
