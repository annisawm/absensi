@extends('layouts.master')
@section('title')
    <title>List Data Notulensi</title>
@endsection
@section('header')
    <h1>List Data Notulensi</h1>
@endsection
@section('subheader')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">List Data Notulensi</li>
@endsection
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <a href="/notes">Back</a>
                <br/>
                <br/>
                <a href="/notes/kembalikan_semua" onclick="return confirm('Apakah Anda yakin ingin mengembalikan semua data ini?')">Kembalikan Semua</a>
                |
                <a href="/notes/hapus_permanen_semua" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen semua data ini?')">Hapus Permanen Semua</a>
                <br/>
                <br/>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Judul Notulensi</th>
                        <th>Acara/Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notes as $n)
                        <tr>
                            <td>{{ $n->judul }}</td>
                            <td>{{ $n->programs->acara }}</td>
                            <td>{{ $n->programs->tanggal }}</td>
                            <td>
                                <a href="/notes/kembalikan/{{ $n->id }}" class="btn btn-success btn-sm"  onclick="return confirm('Apakah Anda yakin ingin mengembalikan data ini?')"><i class="fas fa-trash-restore"></i> Restore</a>
                                <a href="/notes/hapus_permanen/{{ $n->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen data ini?')"><i class="fas fa-trash-alt"></i> Hapus Permanen</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
