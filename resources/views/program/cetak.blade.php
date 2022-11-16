<!DOCTYPE html>
<html>
<head>
    <title>Laporan Daftar Hadir</title>
</head>
<body>
@foreach($program as $p)
    <p>Acara: {{ $p->acara}}</p>
    <p>Tanggal Kegiatan: {{ $p->tanggal}}</p>
    <p>Waktu Kegiatan: {{ $p->waktu}}</p>
    <p>Tempat: {{ $p->tempat}}</p>
@endforeach
</body>
</html>
