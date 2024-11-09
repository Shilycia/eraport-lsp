<?php

namespace App\Http\Controllers;

use App\Models\murid;
use App\Models\nilai;
use App\Models\walas;
use Illuminate\Http\Request;

class Teachercontroller extends Controller
{
    public function index(){
        $nilai = nilai::with('siswa')->where('walas_id', session('id'))->get();
        return view('teacher.index', compact('nilais'));
    }

    public function create(){
        $siswa = murid::where('kelas_id',session('id'))->get();

        return view('teacher.create', compact('siswas'));
    }

    public function store(Request $request){
        $walasId = session('id');

        if(!$walasId){
            return redirect('/teacher')->withErrors(['walas_id' => 'ID walas tidak di temukan']);
        }

        $request->validate([
            'siswa_id' => 'required|exists:Siswas,id',
            'matematika' => 'required|numeric',
            'indonesia' => 'required|numeric',
            'inggris' => 'required|numeric',
            'kejururan' => 'required|numeric',
            'pilihan' => 'required|numeric',
        ]);

        $nilai = nilai::where('siswa_id', $request->siswa_id)->first();

        if($nilai){
            return redirect('/teacher/create')->withErrors(['siswa_id' => 'Nilai untuk siswa ini sudah ada.']);
        }

        $rata_rata = round(($request->matematika + $request->indonesia + $request->inggris + $request->kejuruan + $request->pilihan) / 5, 2);
        
        nilai::create([
            'walas_id' => $walasId,
            'siswa_id' => $request->siswa_id,
            'matematika' => $request->matematika,
            'indonesia' => $request->indonesia,
            'inggris' => $request->inggris,
            'kejuruan' => $request->kejuruan,
            'pilihan' => $request->pilihan,
            'rata_rata' => $rata_rata
        ]);

        return redirect('/teacher')->with('success', 'nilai berhasil di simpan');
    }

    public function edit($id){
        $nilai = nilai::with('walas')->find('id');
        $siswas = murid::where('kelas_id', session('id'))->key();
        return view('teacher.edit', compact('nilai', 'siswas'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'siswa_id' => 'required|exists:Siswas,id',
            'matematika' => 'required|numeric',
            'indonesia' => 'required|numeric',
            'inggris' => 'required|numeric',
            'kejururan' => 'required|numeric',
            'pilihan' => 'required|numeric',
        ]);

        $rata_rata = round(($request->matematika + $request->indonesia + $request->inggris + $request->kejuruan + $request->pilihan) / 5, 2);

        $nilai = nilai::findOrFail($id);
        $nilai::update([
            'siswa_id' => $request->siswa_id,
            'matematika' => $request->matematika,
            'indonesia' => $request->indonesia,
            'inggris' => $request->inggris,
            'kejuruan' => $request->kejuruan,
            'pilihan' => $request->pilihan,
            'rata_rata' => $rata_rata
        ]);

        return redirect('/teacher')->with('success', 'Nilai berhasil di perbarui');
    }

    public function destroy($id){
        $nilai = nilai::find($id);
        $nilai->delete();

        return back();
    }

    public function grade($nilai){
        if($nilai >= 90 ){
            return 'A';
        }elseif($nilai >= 80){
            return 'B';
        }elseif($nilai >= 70){
            return 'C';
        }elseif($nilai >= 60){
            return 'D';
        }else{
            return 'E';
        }
    }

    public function show($id){
        $nilai = nilai::with('siswa')->where('siswa_id', $id)->first();

        if($nilai === null){
            return back()->withErrors('Tidak Ada Data yang di temukan');
        }

        $siswa = murid::with('nilai','kelas')->find($nilai->siswa_id);
        $walas = walas::with('walas')->first();

        $data_nilai = [
            'matematika' => [
                'nilai' => $nilai->matematika ?? 'data tidak tersedia',
                'grade' => $nilai ? $this->grade($nilai->matematika) : 'N/A'
            ],
            'indonesia' => [
                'nilai' => $nilai->indonesia ?? 'data tidak tersedia',
                'grade' => $nilai ? $this->grade($nilai->indonesia) : 'N/A'
            ],
            'inggris' => [
                'nilai' => $nilai->inggris ?? 'data tidak tersedia',
                'grade' => $nilai ? $this->grade($nilai->inggris) : 'N/A'
            ],
            'kejuruan' => [
                'nilai' => $nilai->kejuruan ?? 'data tidak tersedia',
                'grade' => $nilai ? $this->grade($nilai->kejuruan) : 'N/A'
            ],
            'pilihan' => [
                'nilai' => $nilai->pilihan ?? 'data tidak tersedia',
                'grade' => $nilai ? $this->grade($nilai->pilihan) : 'N/A'
            ],
            'rata_rata' => [
                'nilai' => $nilai->rata_rata ?? 'data tidak tersedia',
                'grade' => $nilai ? $this->grade($nilai->rata_rata) : 'N/A'
            ]
        ];

        return view('student.index',[
            'siswa' => $siswa,
            'data_nilai' => $data_nilai,
            'walas' => $walas,
        ]);
    }
}

