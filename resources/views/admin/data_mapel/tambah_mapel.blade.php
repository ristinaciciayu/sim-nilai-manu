@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Tambah Mapel</h1>

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
            <strong>Form Tambah Mapel</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.data_mapel.store') }}" method="POST">
                @csrf
                <table class="table table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 200px;">Nama Mapel</th>
                            <td><input type="text" class="form-control" name="nama_mapel" value="{{ old('nama_mapel') }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">KKM</th>
                            <td><input type="number" class="form-control" name="kkm" value="{{ old('kkm') }}"></td>
                        </tr>
                        <tr>
                            <th class="text-center">Semester</th>
                            <td>
                                <select name="semester" class="form-select">
                                    <option value="">-- Pilih Semester --</option>
                                    <option value="Ganjil" {{ old('semester')=='Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="Genap" {{ old('semester')=='Genap' ? 'selected' : '' }}>Genap</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.data_mapel.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
