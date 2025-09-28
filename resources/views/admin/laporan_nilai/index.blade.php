@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Laporan Nilai Siswa</h1>

    <div class="card shadow-sm mb-3">
        <!-- Header Card: Filter Kelas + Mapel + Cetak PDF -->
        <div class="card-header">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-3">
                <!-- Form Filter -->
                <form action="{{ route('admin.laporan.nilai.index') }}" method="GET" class="d-flex flex-wrap align-items-center gap-2">
                    
                    <!-- Filter Kelas -->
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <select name="kelas" class="form-select">
                            <option value="">Semua Kelas</option>
                            @foreach($daftar_kelas as $k)
                                <option value="{{ $k }}" {{ $kelas == $k ? 'selected' : '' }}>{{ $k }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter Mapel -->
                    <div class="input-group">
                        <span class="input-group-text bg-info text-white">
                            <i class="bi bi-book-half"></i>
                        </span>
                        <select name="mapel" class="form-select">
                            <option value="">Semua Mapel</option>
                            @foreach($daftar_mapel as $m)
                                <option value="{{ $m }}" {{ $mapel == $m ? 'selected' : '' }}>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Filter, Reset & Cetak PDF -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Filter
                        </button>
                        <a href="{{ route('admin.laporan.nilai.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-repeat"></i> Reset
                        </a>
                        <a href="{{ route('admin.laporan.nilai.pdf', ['kelas' => $kelas, 'mapel' => $mapel]) }}" target="_blank" class="btn btn-success">
                            <i class="bi bi-printer"></i> Cetak PDF
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Body Card: Tabel Nilai -->
        <div class="card-body p-0">
            <table class="table table-striped table-hover table-bordered align-middle mb-0">
                <thead class="table-primary text-center">
                    <tr>
                         <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Mapel</th>
                        <th>Ulangan Harian</th> 
                        <th>Tugas</th>          
                        <th>UTS</th>           
                        <th>Nilai Akhir</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($nilai as $n)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $n->nis }}</td>
                            <td>{{ $n->nama_siswa }}</td>
                            <td>{{ $n->kelas }}</td>
                            <td>{{ $n->mapel }}</td>
                            <td>{{ $n->tugas }}</td>
                            <td>{{ $n->pts }}</td>
                            <td>{{ $n->pas }}</td>
                            <td>{{ $n->nilai_akhir }}</td>
                            <!-- <td class="text-center">
                                <a href="{{ route('admin.laporan.nilai.edit', $n->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </td> -->
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Belum ada data nilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Card: Pagination -->
        @if(method_exists($nilai, 'links'))
            <div class="card-footer d-flex justify-content-center">
                {{ $nilai->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>

<!-- SweetAlert2 untuk notifikasi sukses -->
@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endsection
