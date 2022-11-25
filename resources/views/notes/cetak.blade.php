<!DOCTYPE html>
<html>
<head>
    <title>Notulensi</title>
</head>
<body>
@foreach($program as $p)
    <p>Acara: {{ $p->acara}}</p>
    <p>Tanggal Kegiatan: {{ $p->tanggal}}</p>
    <p>Waktu Kegiatan: {{ $p->waktu}}</p>
    <p>Tempat: {{ $p->tempat}}</p>
@endforeach
@foreach($notes as $n)
    <h4 align="center">NOTULEN</h4>
    <p>Judul                  : {{ $n->judul}}</p>
    <p>PIMPINAN SIDANG/RAPAT</p>
    <p>Ketua                  : {{ $n->ketua}}</p>
    <p>Sekretaris             : {{ $n->sekretaris}}</p>
    <p>Pencatat               : {{ $n->pencatat}}</p>
    <p>Peserta                : {{ $n->peserta}}</p>
    <p>KEGIATAN SIDANG/RAPAT  : {{ $n->isi}}</p>
    <p>1. Pembuka             : {{ $n->pembuka}}</p>
    <p>2. Pembahasan          : {{ $n->pembahasan}}</p>
    <p>3. Keputusan           : {{ $n->keputusan}}</p>
@endforeach
</body>
</html>
