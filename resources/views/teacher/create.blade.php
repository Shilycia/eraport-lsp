@extends('layout.app')
<x-layout>
    @section('content')
        <div class="create-container">
            <form action="{{ route('teacher.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="walas">Walas:</label>
                    <input type="text" id="walas" name="walas" class="form-control" value="{{ session('username') }}" disabled>
                </div>

                <div class="form-group">
                    <label for="siswa_id">Nama Siswa:</label>
                    <select name="siswa_id" id="siswa_id" class="form-control" required >
                        <option value="">Pilih Siswa</option>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}">
                                {{$siswa->nama_siswa}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="matematika">Matematika:</label>
                    <input type="number" name="matematika" required id="matematika" class="from-control">
                </div>
                <div class="form-group">
                    <label for="indonesia">Bahasa Indonesia:</label>
                    <input type="number" name="indonesia" required id="indonesia" class="from-control">
                </div>
                <div class="form-group">
                    <label for="inggris">Bahasa Inggris:</label>
                    <input type="number" name="inggris" required id="inggris" class="from-control">
                </div>
                <div class="form-group">
                    <label for="kejururan">kejururan:</label>
                    <input type="number" name="kejururan" required id="kejururan" class="from-control">
                </div>
                <div class="form-group">
                    <label for="pilihan">Mapel Pilihan:</label>
                    <input type="number" name="pilihan" required id="pilihan" class="from-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    @endsection
</x-layout>