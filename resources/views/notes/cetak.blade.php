    <!DOCTYPE html>
<html>
<head>
    <title>Notulensi</title>
</head>
<body>
@foreach($notes as $n)
    <h4 align="center">NOTULEN</h4>
    <p>Judul: {{ $n->judul}}</p>
    <p>PIMPINAN SIDANG/RAPAT</p>
    <p>Ketua: {{ $n->ketua}}</p>
    <p>Sekretaris: {{ $n->sekretaris}}</p>
    <p>Pencatat: {{ $n->pencatat}}</p>
    <p>Peserta: {{ $n->peserta}}</p>
    <p>KEGIATAN SIDANG/RAPAT: {{ $n->isi}}</p>
    <p>1. Pembuka: {{ $n->pembuka}}</p>
    <p>2. Pembahasan: {{ $n->pembahasan}}</p>
    <p>3. Keputusan: {{ $n->keputusan}}</p>
@endforeach
</body>
</html>
