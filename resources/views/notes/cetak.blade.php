<!DOCTYPE html>
<html>
<head>
    <title>Notulensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        td{
            vertical-align: top;
        }

        .horizontal_center1{
            border-top: 2px solid black;
            height: 2px;
            width : 740px;
        }
        .horizontal_center2{
            border-top: 6px solid black;
            height: 2px;
            width : 740px;
        }

        ol{
            margin-left: -18px;
            padding-left: -18px;
        }
    </style>
</head>
<body>


<table style="width:100%">
        <td style="width: 20%"><img src="{{public_path('pemkab.jpeg')}}" alt="" height="110px" width="110px"></td>

        <td style="width: 80%"><div style="text-align: center;">
                <h5>PEMERINTAH KABUPATEN SITUBONDO</h5>
                <h3>DINAS KOMUNIKASI DAN INFORMATIKA</h3>
                <h8>Jl. PB. Sudirman No. 1 Telp / Faks (0338) 674099, SITUBONDO-6312<br></h8>
                <h8>website kominfo.situbondokab.go.id, email diskominfo@situbondokab.go.id</h8>
                <br>
            </div>
        </td>
</table>
<div class="horizontal_center1"></div>
<div class="horizontal_center2"></div>
<br>
<h5 align="center">NOTULEN</h5>
<br>
<table style="width:100%">
    <tr>
        @foreach($notes as $no)
            <td>Sidang/ Rapat</td>
            <td style="width:2%">:</td>
            <td>{{ $no->judul }}</td>
        @endforeach
    </tr>
    <tr>
        @foreach($program as $p)
            <td>Hari/Tanggal</td>
            <td>:</td>
            <td>{{ $p->tanggal}}</td>
    </tr>
    <tr>
        <td>Jam Panggilan</td>
        <td>:</td>
        <td>{{ $p->jam}}</td>
    </tr>
    <tr>
        <td>Jam sidang/rapat</td>
        <td>:</td>
        <td>{{ $p->waktu}}</td>
    </tr>
    <tr>
        <td>Acara </td>
        <td>:</td>
        <td>{{ $p->acara}}</td>
        @endforeach
    </tr>
    <br>

    <tr>
        @foreach($notes as $n)
        <td style="width:35%">PIMPINAN SIDANG/RAPAT </td>
    </tr>
    <br>

    <tr>
        <td>Ketua</td>
        <td>:</td>
        <td>{{ $n->ketua }}</td>
    </tr>

    <tr>
        <td>Sekretaris</td>
        <td>:</td>
        <td>{{ $n->sekretaris }}</td>
    </tr>

    <tr>
        <td>Pencatat</td>
        <td>:</td>
        <td>{{ $n->pencatat }}</td>
    </tr>

    <tr>
        <td>Peserta</td>
        <td>:</td>
        <td>{!!$n->peserta!!}</td>
    </tr>

    <tr>
        <td>KEGIATAN SIDANG/RAPAT</td>
        <td>:</td>
        <td>{!! $n->isi  !!} </td>
    </tr>

    <tr>
        <td>1. Pembuka</td>
        <td>:</td>
        <td>{!! $n->pembuka !!}</td>
    </tr>

    <tr>
        <td>2. Pembahasan</td>
        <td>:</td>
        <td>{!! $n->pembahasan !!}</td>
    </tr>

    <tr>
        <td>3. Keputusan</td>
        <td>:</td>
        <td>{!! $n->keputusan !!}</td>
        @endforeach
    </tr>
</table>
</body>
</html>
