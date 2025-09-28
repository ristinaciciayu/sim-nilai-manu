@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Data Siswa</h1>

    <div class="card shadow-sm">
        <!-- Header Card: Search saja -->
        <div class="card-header d-flex justify-content-end">
            <form action="{{ route('guru.data_siswa.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                       placeholder="Cari berdasarkan nama" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
        </div>

        <!-- Body Card: Tabel Siswa -->
        <div class="card-body p-0">
            <table class="table table-striped table-hover table-bordered align-middle mb-0">
                <thead class="table-primary text-center">
                    <tr>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswas as $siswa)
                        <tr>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->alamat }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>{{ $siswa->no_tlpn }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data siswa tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Card: Pagination -->
        @if($siswas->count())
            <div class="card-footer d-flex justify-content-center">
                <nav>
                    <ul class="pagination pagination-sm justify-content-center mb-0">
                        {{-- Previous --}}
                        @if ($siswas->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $siswas->previousPageUrl() }}">&laquo;</a></li>
                        @endif

                        {{-- Pages --}}
                        @foreach ($siswas->getUrlRange(1, $siswas->lastPage()) as $page => $url)
                            @if ($page == $siswas->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($siswas->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $siswas->nextPageUrl() }}">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>
@endsection
