@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Data Mapel</h1>

    <div class="card shadow-sm">
        <!-- Header Card: Search -->
        <div class="card-header d-flex justify-content-end align-items-center">
            <form action="{{ route('guru.data_mapel') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2"
                       placeholder="Cari berdasarkan nama mapel"
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
        </div>

        <!-- Body Card: Tabel Data -->
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered align-middle mb-0">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Mapel</th>
                        <th>KKM</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mapels as $i => $mapel)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $mapel->nama_mapel }}</td>
                            <td class="text-center">{{ $mapel->kkm }}</td>
                            <td class="text-center">{{ $mapel->semester }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data mapel</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Card: Pagination Rapi -->
        @if($mapels->count())
            <div class="card-footer d-flex justify-content-center">
                <nav>
                    <ul class="pagination pagination-sm justify-content-center mb-0">
                        @if ($mapels->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $mapels->previousPageUrl() }}">&laquo;</a></li>
                        @endif

                        @foreach ($mapels->getUrlRange(1, $mapels->lastPage()) as $page => $url)
                            @if ($page == $mapels->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        @if ($mapels->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $mapels->nextPageUrl() }}">&raquo;</a></li>
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
