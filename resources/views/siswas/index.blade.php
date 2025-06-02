@extends('layouts.app')
@section('content')
@section('title','siswa')

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="{{route('siswas.create')}}" class="btn btn-primary btn-sm font-poppins">
          <i class="fas fa-plus"> Tambah </i>
      </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($siswas as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->kelas}}</td>
                        <td>{{$item->jenis_kelamin}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>
                            <a href="{{route('siswas.edit',$item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('siswas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
