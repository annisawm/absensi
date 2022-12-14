<!DOCTYPE html>
<html>
<head>
    <title>Notulensi</title>
</head>
<body>
<h4 align="center">NOTULEN</h4>
@foreach($program as $p)
    <p>SIDANG/RAPAT : {{ $p->judul}}</p>
    <p>Hari/Tanggal: {{ $p->tanggal}}</p>
    <p>Jam sidang/rapat: {{ $p->waktu}}</p>
    <p>Acara: {{ $p->acara}}</p>
@endforeach
@foreach($notes as $n)
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
