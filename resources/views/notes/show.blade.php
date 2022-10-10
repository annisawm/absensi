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
    <h1>Notulensi Kegiatan</h1>
@endsection
@section('subheader')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Notulensi</li>
@endsection

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show</h2>
            </div>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Notulensi:</strong>
                {!! $note->notulensi !!}
            </div>
        </div>
    </div>
@endsection
