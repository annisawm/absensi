@extends('layouts.master')
@section('title')
    <title>Formulir Kegiatan</title>
    <title>Tambah Data</title>
@endsection
@section('header')
    <h1>Formulir Daftar Kegiatan</h1>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('program.create') }}" class="btn btn-md btn-success mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-user-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </a>
{{--                        <a href="/program/trash" class="btn btn-md btn-success mb-3">--}}
{{--                            <span class="icon text-white-50">--}}
{{--                                <i class="fas fa-trash-alt"></i>--}}
{{--                            </span>--}}
{{--                            <span class="text">Trash</span>--}}
{{--                        </a>--}}
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">SIDANG/RAPAT</th>
                                <th scope="col">JAM SIDANG/RAPAT</th>
                                <th scope="col">JAM PANGGILAN</th>
                                <th scope="col">HARI/TANGGAL</th>
                                <th scope="col">TEMPAT</th>
                                <th scope="col">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($programs as $program)
                                <tr>
{{--                                    <td>{!! ++$i !!}</td>--}}
                                    <td>{!! $program->acara !!}</td>
                                    <td>{!! $program->waktu !!}</td>
                                    <td>{!! $program->jam !!}</td>
                                    <td>{!! $program->tanggal !!}</td>
                                    <td>{!! $program->tempat !!}</td>
                                    <td class="text-center">
                                        @canany(['operator','pejabat'])
                                        <a href="/program/{{$program->id }}" class="btn btn-info btn-sm"><i class="far fa-eye"></i> Detail</a>
                                        @endcanany
                                        @can('operator')
                                        <a href="/program/{{$program->id}}/edit" class="btn btn-success btn-sm"><i class="fas fa-user-edit"></i> Update</a>
                                        <form action="/program/{{$program->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i> Delete</button>
                                        </form>
                                            @endcan
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
