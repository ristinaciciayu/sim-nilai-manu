@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Data Guru</h1>

    <div class="card shadow-sm">
        <!-- Header Card: Tambah + Search -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.data_guru.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Guru
            </a>

            <form action="{{ route('admin.data_guru.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari berdasarkan nama" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
        </div>

        <!-- Body Card: Tabel Guru -->
        <div class="card-body p-0">
            <table class="table table-striped table-hover table-bordered align-middle mb-0">
            
                <thead class="table-primary text-center" >
                
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $guru)
                        <tr>
                            <td>{{ $guru->nip }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td>{{ $guru->jenkel }}</td>
                            <td class="text-center">
                                {{ $guru->tgl_lahir instanceof \Carbon\Carbon 
                                    ? $guru->tgl_lahir->format('d-m-Y') 
                                    : date('d-m-Y', strtotime($guru->tgl_lahir)) }}
                            </td>
                            <td>{{ $guru->alamat }}</td>
                            <td>{{ $guru->email }}</td>
                            <td>{{ $guru->no_telp }}</td>
                            <td class="text-center">
                                <span class="badge {{ $guru->status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $guru->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.data_guru.edit', $guru->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.data_guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Data guru tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Card: Pagination rapi tanpa file blade -->
        @if($gurus->count())
            <div class="card-footer d-flex justify-content-center">
                <nav>
                    <ul class="pagination pagination-sm justify-content-center mb-0">
                        {{-- Previous --}}
                        @if ($gurus->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $gurus->previousPageUrl() }}">&laquo;</a></li>
                        @endif

                        {{-- Pages --}}
                        @foreach ($gurus->getUrlRange(1, $gurus->lastPage()) as $page => $url)
                            @if ($page == $gurus->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($gurus->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $gurus->nextPageUrl() }}">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>

<!-- SweetAlert2 -->
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
