{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<h3>--}}
{{--    <center>Laporan Daftar Hadir</center>--}}
{{--</h3>--}}
{{--<table>--}}
{{--    <tr>--}}
{{--        <th>Judul</th>--}}
{{--        <th>Ketua</th>--}}
{{--        <th>Sekretaris</th>--}}
{{--        <th>Pencatat</th>--}}
{{--        <th>Peserta</th>--}}
{{--        <th>Isi</th>--}}
{{--        <th>Kata Pembukaan</th>--}}
{{--        <th>Pembahasan</th>--}}
{{--        <th>Keputusan</th>--}}
{{--    </tr>--}}
{{--    @foreach ($notes as $n)--}}
{{--        <tr>--}}
{{--            <td>{{ $n->judul}}</td>--}}
{{--            <td>{{ $n->ketua }}</td>--}}
{{--            <td>{{ $n->sekretaris }}</td>--}}
{{--            <td>{{ $n->pencatat }}</td>--}}
{{--            <td>{{ $n->peserta }}</td>--}}
{{--            <td>{{ $n->isi }}</td>--}}
{{--            <td>{{ $n->pembuka }}</td>--}}
{{--            <td>{{ $n->pembahasan }}</td>--}}
{{--            <td>{{ $n->keputusan }}</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}
{{--</html>--}}

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
