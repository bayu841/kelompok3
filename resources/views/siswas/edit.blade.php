@extends('layouts.app')
@section('title', 'Edit Siswa')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit Siswa</h1>
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Siswa</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('siswas.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="laki_laki" {{ $siswa->jenis_kelamin == 'laki_laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ $siswa->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $siswa->alamat) }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
