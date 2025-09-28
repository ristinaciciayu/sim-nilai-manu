@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Edit Guru</h1>

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
            <strong>Form Edit Guru</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.data_guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <table class="table table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 200px;">NIP</th>
                            <td><input type="text" class="form-control" name="nip" value="{{ old('nip', $guru->nip) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">Nama</th>
                            <td><input type="text" class="form-control" name="nama" value="{{ old('nama', $guru->nama) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">Jenis Kelamin</th>
                            <td>
                                <select name="jenkel" class="form-select">
                                    <option value="Laki-laki" {{ old('jenkel', $guru->jenkel)=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenkel', $guru->jenkel)=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Tanggal Lahir</th>
                            <td>
                                <input type="date" class="form-control" name="tgl_lahir"
                                    value="{{ old('tgl_lahir', \Carbon\Carbon::parse($guru->tgl_lahir)->format('Y-m-d')) }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">Alamat</th>
                            <td><input type="text" class="form-control" name="alamat" value="{{ old('alamat', $guru->alamat) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">Email</th>
                            <td><input type="email" class="form-control" name="email" value="{{ old('email', $guru->email) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">No. Telp</th>
                            <td><input type="text" class="form-control" name="no_telp" value="{{ old('no_telp', $guru->no_telp) }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">Status</th>
                            <td>
                                <select name="status" class="form-select" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Aktif" {{ old('status', $guru->status)=='Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Nonaktif" {{ old('status', $guru->status)=='Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Update
                    </button>
                    <a href="{{ route('admin.data_guru.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
