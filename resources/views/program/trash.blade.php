@extends('layouts.master')
@section('title')
    <title>Formulir Kegiatan</title>
    <title>Tambah Data</title>
@endsection
@section('subheader')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Formulir Daftar Kegiatan</li>
@endsection
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">Data Program</div>
            <div class="card-body">
                <a href="/program">Back</a>
                <br/>
                <br/>
                <a href="/program/kembalikan_semua" onclick="return confirm('Apakah Anda yakin ingin mengembalikan semua data ini?')">Kembalikan Semua</a>
                |
                <a href="/program/hapus_permanen_semua" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen semua data ini?')">Hapus Permanen Semua</a>
                <br/>
                <br/>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ACARA/KEGIATAN</th>
                        <th scope="col">TANGGAL KEGIATAN</th>
                        <th scope="col">WAKTU KEGIATAN</th>
                        <th scope="col">TEMPAT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($program as $p)
                        <tr>
                            <td>{!! $p->acara !!}</td>
                            <td>{!! $p->tanggal !!}</td>
                            <td>{!! $p->waktu !!}</td>
                            <td>{!! $p->tempat !!}</td>
                            <td>
                                <a href="/program/kembalikan/{{ $p->id }}" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengembalikan data ini?')"><i class="fas fa-trash-restore"></i> Restore</a>
                                <a href="/program/hapus_permanen/{{ $p->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen data ini?')"><i class="fas fa-trash-alt"></i> Hapus
                                    Permanen</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
