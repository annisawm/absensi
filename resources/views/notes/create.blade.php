@extends('layouts.master')
@section('title')
    <title> Notulensi </title>
@endsection
@section('header')
    <h1>Notulensi Kegiatan</h1>
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('notes.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('notes.store') }}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Notulensi </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Judul:</strong>
                                        <input type="text" name="judul" class="form-control" placeholder="Judul">
                                        <input type="hidden" value="{{$program->id}}" name="program_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Pimpinan Sidang/Rapat </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ketua:</strong>
                                        <input type="text" name="ketua" class="form-control" placeholder="Ketua Rapat">
                                        <input type="hidden" value="{{$program->id}}" name="program_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sekretaris:</strong>
                                        <input type="text" name="sekretaris" class="form-control" placeholder="Sekretaris Rapat">
                                        <input type="hidden" value="{{$program->id}}" name="program_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Pencatat:</strong>
                                        <input type="text" name="pencatat" class="form-control" placeholder="Pencatat">
                                        <input type="hidden" value="{{$program->id}}" name="program_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Peserta Sidang/Rapat:</strong>
                                        <textarea id="peserta" class="form-control" style="height:150px"
                                                  name="peserta" placeholder="Peserta Rapat"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Kegiatan Sidang/Rapat </h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Isi:</strong>
                                        <textarea id="isi" class="form-control" style="height:150px"
                                                  name="isi" placeholder="Isi Kegiatan Rapat"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>1. Kata Pembukaan:</strong>
                                        <textarea id="pembuka" class="form-control" style="height:150px"
                                                  name="pembuka" placeholder="Kata Pembukaan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>2. Pembahasan:</strong>
                                        <textarea id="pembahasan" class="form-control" style="height:150px"
                                                  name="pembahasan" placeholder="Pembahasan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>3. Keputusan:</strong>
                                        <textarea id="keputusan" class="form-control" style="height:150px"
                                                  name="keputusan" placeholder="Keputusan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script
        src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#peserta').summernote();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#isi').summernote();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#pembuka').summernote();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#pembahasan').summernote();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#penutup').summernote();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#keputusan').summernote();
        });
    </script>
@endpush


