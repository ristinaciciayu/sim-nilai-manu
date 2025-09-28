@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Input Nilai Kelas {{ $kelas }}</h1>

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
            <strong>Form Input Nilai</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('guru.nilai.store_batch',['kelas'=>$kelas]) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Mata Pelajaran</label>
                    <select name="mapel" id="mapel" class="form-control" required>
                        <option value="">-- Pilih Mapel --</option>
                        @foreach($mapel_list as $m)
                            <option value="{{ $m }}">{{ $m }}</option>
                        @endforeach
                    </select>
                </div>

                <table class="table table-bordered table-hover align-middle" id="tabel-nilai" style="display:none;">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Ulangan Harian</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success" id="simpan-btn" style="display:none;">
                        <i class="bi bi-save"></i> Simpan Semua Nilai
                    </button>
                    <a href="{{ route('guru.nilai.index', ['kelas' => $kelas]) }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    var kelas = "{{ $kelas }}";
    if(kelas){
        $.ajax({
            url: '/guru/nilai/siswa/' + kelas,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                var tbody = '';
                $.each(data, function(i,siswa){
                    tbody += '<tr>';
                    tbody += '<td><input type="text" name="nis[]" value="'+siswa.nis+'" readonly class="form-control"></td>';
                    tbody += '<td><input type="text" value="'+siswa.nama_siswa+'" readonly class="form-control"></td>';
                    tbody += '<td><input type="number" name="pts[]" min="0" max="100" class="form-control"></td>';
                    tbody += '<td><input type="number" name="tugas[]" min="0" max="100" class="form-control"></td>';
                    tbody += '<td><input type="number" name="pas[]" min="0" max="100" class="form-control"></td>';
                    tbody += '</tr>';
                });
                $('#tabel-nilai tbody').html(tbody);
                $('#tabel-nilai').show();
                $('#simpan-btn').show();
            }
        });
    }
});
</script>
@endsection
