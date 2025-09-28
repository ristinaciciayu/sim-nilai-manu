@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Edit Kelas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header text-white" style="background-color: #445ebf;">
            <strong>Form Edit Kelas</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.data_kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 200px;">Nama Kelas</th>
                            <td><input type="text" class="form-control" name="kelas" value="{{ old('kelas', $kelas->kelas) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">NIP Walikelas</th>
                            <td><input type="text" class="form-control" name="nip" value="{{ old('nip', $kelas->nip) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">Nama Walikelas</th>
                            <td><input type="text" class="form-control" name="nama_walikelas" value="{{ old('nama_walikelas', $kelas->nama_walikelas) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">Jumlah Siswa</th>
                            <td><input type="number" class="form-control" name="jumlah_siswa" value="{{ old('jumlah_siswa', $kelas->jumlah_siswa) }}"></td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <a href="{{ route('admin.data_kelas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
