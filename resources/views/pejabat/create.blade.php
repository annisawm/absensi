@extends('layouts.master')
@section('title')
    <title>Tambah Data</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('pejabat.store') }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">NIP</label>
                                <input type="text"
                                       class="form-control @error('nip') is-invalid @enderror"
                                       name="nip" value="{{ old('nip') }}"
                                       placeholder="Masukkan NIP Pejabat"><div>
                                    @error('nip')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <br>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}"
                                       placeholder="Masukkan Nama Pejabat">
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
                                    <label class="font-weight-bold">JENIS KELAMIN</label>
                                    <br>
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
                                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
                                </div>

                                <div class="form-group">
                                    <label for="opd_kode">NAMA INSTANSI</label>
                                    <select name="opd_kode" id="opd_kode" class="form-control">
                                        <option value="0">Pilih Instansi</option>
                                        @foreach($opd as $skpd)
                                            <option value="{{$skpd->kode}}">{{$skpd->nama_opd}}</option>
                                        @endforeach
                                    </select>
                                    @error('opd_kode')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">JABATAN</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                           name="jabatan" value="{{ old('jabatan') }}" placeholder="Masukkan Jabatan">

                                    <!-- error message untuk title -->
                                    @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">EMAIL</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           name="email"  placeholder="Masukkan Email">

                                    <!-- error message untuk title -->
                                    @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">PASSWORD</label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
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

@push('js')

    <script>
        $("#status").change(function () {
            var id = $(this).val();
            id == 1 ? $('#nip').prop("disabled", false) : $('#nip').prop("disabled", true);
        });
    </script>

    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#opd_kode').select2();
        });
    </script>
@endpush

