@extends('layouts.guest')
@section('title')
    <title>Form Daftar Hadir</title>
@endsection
@section('header')
    <h1>Formulir Daftar Hadir Peserta</h1>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">ACARA/KEGIATAN</th>
                                <th scope="col">TANGGAL KEGIATAN</th>
                                <th scope="col">WAKTU KEGIATAN</th>
                                <th scope="col">TEMPAT</th>
                                <th scope="col">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($programs as $program)
                                <tr>
                                    <td>{!! ++$i !!}</td>
                                    <td>{!! $program->acara !!}</td>
                                    <td>{!! $program->tanggal !!}</td>
                                    <td>{!! $program->waktu !!}</td>
                                    <td>{!! $program->tempat !!}</td>
                                    <td class="text-center">
                                        <a href="{{route('absensi.show',$program->id)}}" class="btn btn-info btn-sm"><i class="far fa-eye"></i>Daftar Hadir</a>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Belum Tersedia
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
