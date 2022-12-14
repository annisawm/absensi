@extends('layouts.master')
@section('title')
    <title>Tambah Data Pejabat</title>
@endsection
@section('header')
    <h1>Data Pejabat</h1>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container mt-8">
        <div class="row">
            <div class="col-md-14">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('pejabat.create') }}" class="btn btn-md btn-success mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-user-plus"></i>
                            </span>
                            <span class="text">Tambah Data Pejabat</span>
                        </a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JENIS KELAMIN(L/P)</th>
                                <th scope="col">NAMA INSTANSI(OPD)</th>
                                <th scope="col">JABATAN</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($pejabats as $pejabat)
                                <tr>
                                    <td>{!! $pejabat->nip !!}</td>
                                    <td>{!! $pejabat->name !!}</td>
                                    <td>{!! $pejabat->jenis_kelamin !!}</td>
                                    <td>{!! $pejabat->opds->nama_opd !!}</td>
                                    <td>{!! $pejabat->jabatan !!}</td>
                                    <td>{!! $pejabat->email !!}</td>
                                    <td class="text-lg-left">
                                        <a href="/pejabat/{{$pejabat->id}}/edit" class="btn btn-success btn-sm"><i class="fas fa-user-edit"></i> Update</a>
                                        <form action="/pejabat/{{$pejabat->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i> Delete</button>
                                        </form>
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
