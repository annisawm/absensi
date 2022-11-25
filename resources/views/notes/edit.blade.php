{{--@extends('template_tinymce')--}}
@extends('layouts.master')
@section('header')
    <h1>Notulensi Kegiatan</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('program.index') }}"> Back</a>
            </div>
            <br>
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
                        <form action="{{ route('notes.update',$note->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2> Edit Notulensi </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Judul:</strong>
                                        <input type="text" name="judul" value="{{ $note->judul }}" class="form-control"
                                               placeholder="Judul">
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
                                        <input type="text" name="ketua" value="{{ $note->ketua }}" class="form-control"
                                               placeholder="Ketua Rapat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sekretaris:</strong>
                                        <input type="text" name="sekretaris" value="{{ $note->sekretaris }}"
                                               class="form-control" placeholder="Sekretaris Rapat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Pencatat:</strong>
                                        <input type="text" name="pencatat" value="{{ $note->pencatat }}"
                                               class="form-control" placeholder="Pencatat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Peserta Sidang/Rapat:</strong>
                                        <textarea id="mytextarea" class="form-control" style="height:150px"
                                                  name="peserta"
                                                  placeholder="Peserta Rapat">{{ $note->peserta }}</textarea>
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
                                        <textarea id="mytextarea" class="form-control" style="height:150px" name="isi"
                                                  placeholder="Isi Kegiatan Rapat">{{ $note->isi }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>1. Kata Pembukaan</strong>
                                        <textarea id="mytextarea" class="form-control" style="height:150px"
                                                  name="pembuka"
                                                  placeholder="Kata Pembukaan">{{ $note->pembuka }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>2. Pembahasan:</strong>
                                        <textarea id="mytextarea" class="form-control" style="height:150px"
                                                  name="pembahasan"
                                                  placeholder="Pembahasan">{{ $note->pembahasan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>3. Keputusan:</strong>
                                        <textarea id="mytextarea" class="form-control" style="height:150px"
                                                  name="keputusan"
                                                  placeholder="Keputusan">{{ $note->keputusan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
@endsection
