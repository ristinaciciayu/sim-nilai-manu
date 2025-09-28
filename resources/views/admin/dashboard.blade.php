@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Dashboard Admin</h2>

    <!-- Ringkasan Data -->
    <div class="row mb-4">
        <!-- Guru -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm text-center border-0" style="background:#f5f8ff;">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-person-badge-fill fs-2 text-primary"></i>
                    </div>
                    <h6 class="text-muted">Jumlah Guru</h6>
                    <h4 class="fw-bold">{{ $jumlahGuru }}</h4>
                </div>
            </div>
        </div>
        <!-- Siswa -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm text-center border-0" style="background:#f5f8ff;">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-people-fill fs-2 text-info"></i>
                    </div>
                    <h6 class="text-muted">Jumlah Siswa</h6>
                    <h4 class="fw-bold">{{ $jumlahSiswa }}</h4>
                </div>
            </div>
        </div>
        <!-- Kelas -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm text-center border-0" style="background:#f5f8ff;">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-building fs-2 text-success"></i>
                    </div>
                    <h6 class="text-muted">Jumlah Kelas</h6>
                    <h4 class="fw-bold">{{ $jumlahKelas }}</h4>
                </div>
            </div>
        </div>
        <!-- Mapel -->
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm text-center border-0" style="background:#f5f8ff;">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-journal-bookmark-fill fs-2 text-danger"></i>
                    </div>
                    <h6 class="text-muted">Jumlah Mapel</h6>
                    <h4 class="fw-bold">{{ $jumlahMapel }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Bar -->
    <div class="card shadow-sm mt-4 border-0">
        <div class="card-header bg-white border-0">
            <strong>Ringkasan Data Sekolah</strong>
        </div>
        <div class="card-body" style="height: 300px;">
            <canvas id="dashboardChart"></canvas>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Chart.js -->
<canvas id="dashboardChart" style="width:100%; height:400px;"></canvas> <!-- ubah height sesuai kebutuhan -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('dashboardChart').getContext('2d');

const dashboardChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($chartLabels) !!},
        datasets: [{
            label: 'Jumlah',
            data: {!! json_encode($chartData) !!},
            backgroundColor: '#445ebf',
            borderRadius: 10,
            borderSkipped: false,
            barThickness: 50 // buat batang lebih tebal
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { font: { size: 14 } }, // font lebih besar
                grid: { color: '#eee' }
            },
            x: {
                ticks: { font: { size: 14 } }, // font lebih besar
                grid: { display: false }
            }
        }
    }
});
</script>

@endsection
