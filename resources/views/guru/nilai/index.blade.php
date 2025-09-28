@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Data Nilai Kelas {{ $kelas }}</h1>

    <div class="card shadow-sm">
        <!-- Header Card: Tambah + Search -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('guru.nilai.create', ['kelas' => $kelas]) }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Nilai
            </a>

            <form action="{{ route('guru.nilai.index', ['kelas' => $kelas]) }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari berdasarkan nama" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
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
                        <th>Aksi</th>
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
                            <td class="text-center">
                                <a href="{{ route('guru.nilai.edit', ['kelas' => $kelas, 'id' => $n->id]) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('guru.nilai.destroy', ['kelas' => $kelas, 'id' => $n->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
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

<!-- SweetAlert2 untuk notifikasi sukses CRUD -->
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
