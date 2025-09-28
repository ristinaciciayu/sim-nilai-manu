@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Data Siswa</h1>

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
            <strong>Form Tambah Siswa</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.data_siswa.store') }}" method="POST">
                @csrf
                <table class="table table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="table-custom text-center" style="width: 200px;">NIS</th>
                            <td><input type="text" class="form-control" name="nis" value="{{ old('nis') }}" required></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Nama Siswa</th>
                            <td><input type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa') }}" required></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Alamat</th>
                            <td><textarea class="form-control" name="alamat" required>{{ old('alamat') }}</textarea></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Kelas</th>
                            <td><input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}" required></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Jenis Kelamin</th>
                            <td>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">No. Telepon</th>
                            <td><input type="text" class="form-control" name="no_tlpn" value="{{ old('no_tlpn') }}" required></td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.data_siswa.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
