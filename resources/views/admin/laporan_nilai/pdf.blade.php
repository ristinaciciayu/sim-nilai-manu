<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Nilai Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 5px; text-align: center; }
        .kop { text-align: center; }
        .kop h1,.kop h2, .kop p { margin: 0; }
    </style>
</head>
<body>
    <div class="kop">
        <h1>{{ $dataSekolah['nama_sekolah'] }}</h1>
        <h2>{{ $dataSekolah['alamat'] }} </h2>
        <P>{{ $dataSekolah['tahun'] }}</P>
        <hr>
        <h4>Laporan Nilai Siswa {{ $kelas ? 'Kelas '.$kelas : '' }}</h4>
    </div>

    <table>
        <thead>
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
            @foreach($nilai as $n)
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
