    <!DOCTYPE html>
<html>
<head>
    <title>Notulensi</title>
</head>
<body>
@foreach($notes as $n)
    <p>Judul: {{ $n->judul}}</p>
    <h3>Pimpinan Sidang/Rapat</h3>
    <p>Ketua: {{ $n->ketua}}</p>
    <p>Sekretaris: {{ $n->sekretaris}}</p>
    <p>Pencatat: {{ $n->pencatat}}</p>
    <p>Peserta: {{ $n->peserta}}</p>
    <h3>Kegiatan Sidang/Rapat</h3>
    <p>Isi: {{ $n->isi}}</p>
    <p>1. Pembuka: {{ $n->pembuka}}</p>
    <p>2. Pembahasan: {{ $n->pembahasan}}</p>
    <p>3. Keputusan: {{ $n->keputusan}}</p>
@endforeach


</body>
</html>
