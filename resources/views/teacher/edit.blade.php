@extends('layout.app')
<x-layout>
    @section('content')
        <div class="create-container">
            <form action="/teacher/update/{{ $nilai->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="walas">Walas:</label>
                    <input type="text" id="walas" name="walas" class="form-control" value="{{ $nilai->walas->nama_walas }}" disabled>
                </div>

                <div class="form-group">
                    <label for="siswa_id">Nama Siswa:</label>
                    <select name="siswa_id" id="siswa_id" class="form-control" required >
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}" {{ $siswa->id == $nilai->id ? 'selected': '' }}>
                                {{$siswa->nama_siswa}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="matematika">Matematika:</label>
                    <input type="number" name="matematika" required id="matematika" class="from-control" value="{{ $nilai->matematika }}">
                </div>
                <div class="form-group">
                    <label for="indonesia">Bahasa Indonesia:</label>
                    <input type="number" name="indonesia" required id="indonesia" class="from-control" value="{{ $nilai->indonesia }}">
                </div>
                <div class="form-group">
                    <label for="inggris">Bahasa Inggris:</label>
                    <input type="number" name="inggris" required id="inggris" class="from-control" value="{{ $nilai->inggris }}">
                </div>
                <div class="form-group">
                    <label for="kejururan">kejururan:</label>
                    <input type="number" name="kejururan" required id="kejururan" class="from-control" value="{{ $nilai->kejuruan }}">
                </div>
                <div class="form-group">
                    <label for="pilihan">Mapel Pilihan:</label>
                    <input type="number" name="pilihan" required id="pilihan" class="from-control" value="{{ $nilai->pilihan }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    @endsection
</x-layout>