@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Edit Nilai Siswa</h1>

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
            <strong>Form Edit Nilai</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.laporan.nilai.update', $nilai->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <table class="table table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="table-custom text-center" style="width: 200px;">NIS</th>
                            <td><input type="text" class="form-control" name="nis" value="{{ old('nis', $nilai->nis) }}" required></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Nama Siswa</th>
                            <td><input type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa', $nilai->nama_siswa) }}" required></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Kelas</th>
                            <td><input type="text" class="form-control" name="kelas" value="{{ old('kelas', $nilai->kelas) }}" required></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Mata Pelajaran</th>
                            <td><input type="text" class="form-control" name="mapel" value="{{ old('mapel', $nilai->mapel) }}" required></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Tugas</th>
                            <td><input type="number" class="form-control" name="tugas" value="{{ old('tugas', $nilai->tugas) }}" min="0"></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">PTS</th>
                            <td><input type="number" class="form-control" name="pts" value="{{ old('pts', $nilai->pts) }}" min="0"></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">PAS</th>
                            <td><input type="number" class="form-control" name="pas" value="{{ old('pas', $nilai->pas) }}" min="0"></td>
                        </tr>
                        <tr>
                            <th class="table-custom text-center">Nilai Akhir</th>
                            <td><input type="number" class="form-control" name="nilai_akhir" value="{{ old('nilai_akhir', $nilai->nilai_akhir) }}" min="0" max="100" required></td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <a href="{{ route('admin.laporan.nilai.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
