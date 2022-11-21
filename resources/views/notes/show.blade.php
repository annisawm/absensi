@extends('layouts.master')
@section('title')
    <title> Notulensi </title>
@endsection
@section('subheader')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Notulensi</li>
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Detail Notulensi Kegiatan</h2>
                    <br>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('notes.index') }}"> Back</a>
                    <a href="/notes/cetak" class="btn btn-primary">
                        <i class="fa-solid fa-print"></i> <span class="text">Export PDF</span>
                    </a>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul:</strong>
                    {{ $note->judul }}
                </div>
            </div>

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4> Pimpinan Sidang/Rapat </h4>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ketua:</strong>
                    {{ $note->ketua }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sekretaris:</strong>
                    {{ $note->sekretaris }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pencatat:</strong>
                    {{ $note->pencatat }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Peserta Sidang/Rapat:</strong>
                    {{ $note->peserta }}
                </div>
            </div>

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4> Kegiatan Sidang/Rapat </h4>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Isi Kegiatan Rapat:</strong>
                    {{ $note->isi }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>1. Kata Pembukaan:</strong>
                    {{ $note->pembuka }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>2. Pembahasan:</strong>
                    {{ $note->pembahasan }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>3. Keputusan:</strong>
                    {{ $note->keputusan }}
                </div>
            </div>

        </div>
    </div>
@endsection
