@extends('layouts.master')
@section('title')
    <title>Tambah Data</title>
@endsection
@section('header')
    <h1>Data Pejabat</h1>
@endsection
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pejabat.store') }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}"
                                       placeholder="Masukkan Nama">
                                <div>
                                    <!-- error message untuk title -->
                                    @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="font-weight-bold">EMAIL</label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}"
                                           placeholder="Masukkan Email">
                                    <div>
                                        <!-- error message untuk title -->
                                        @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="font-weight-bold">PASSWORD</label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" value="{{ old('password') }}"
                                               placeholder="Masukkan Password Baru">
                                        <div>
                                            <!-- error message untuk title -->
                                            @error('password')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
