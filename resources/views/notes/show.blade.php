@extends('layouts.master')
@section('title')
    <title> Notulensi </title>
@endsection
@push('js')
    <!-- Bootstrap DateTimePicker -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet">
@endpush
@section('header')
    <h1>Detail Notulensi Kegiatan</h1>
@endsection
@section('subheader')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Notulensi</li>
@endsection

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('notes.index') }}"> Back</a>
            </div>
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
