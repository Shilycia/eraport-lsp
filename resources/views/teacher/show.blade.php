@extends('layout.app')
<x-layout>
    @section('content')
    <div class="index-siswa">
        <div class="show-container">
            <h1>LAPORAN HASIL BELAJAR</h1>
            <table class="t-head">
                <tbody>
                    <tr>
                        <td>Nama Siswa</td>
                        <td class="right">: {{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Induk Siswa</td>
                        <td class="right">: {{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td>Kelas/Semester</td>
                        <td class="right">: {{ $siswa->nama_kelas }} / Ganjil</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="show-container">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Mata Pelajaran</td>
                    <td>Nilai</td>
                    <td>Grade</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="left">Matematika</td>
                    <td>{{ $data_nilai['matematika']['nilai'] }}</td>
                    <td>{{ $data_nilai['matematika']['grade'] }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="left">Bahasa Indonesia</td>
                    <td>{{ $data_nilai['indonesia']['nilai'] }}</td>
                    <td>{{ $data_nilai['indonesia']['grade'] }}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="left">Bahasa Inggris</td>
                    <td>{{ $data_nilai['inggris']['nilai'] }}</td>
                    <td>{{ $data_nilai['inggris']['grade'] }}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="left">Kosentrasi Keahlian</td>
                    <td>{{ $data_nilai['kejuruan']['nilai'] }}</td>
                    <td>{{ $data_nilai['kejuruan']['grade'] }}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="left">Matapelajaran Pilihan</td>
                    <td>{{ $data_nilai['pilihan']['nilai'] }}</td>
                    <td>{{ $data_nilai['pilihan']['grade'] }}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="left">Rata - rata</td>
                    <td>{{ $data_nilai['rata-rata']['nilai'] }}</td>
                    <td>{{ $data_nilai['rata-rata']['grade'] }}</td>
                </tr>
            </tbody>
        </table>
        <div class="walas-container">
            <div class="walas">
                <div class="walas-name">{{ $walas->walas->nama_walas }}</div>
                <div class="strip">_________________________________</div>
            </div>
        </div>
    </div>
    @endsection
</x-layout>