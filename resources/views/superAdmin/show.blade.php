@extends('layouts.master')
@section('title')
    <title>Data Admin</title>
@endsection
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Detail Data Admin</h2>
                    <br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NAMA : </strong>
                    {!! $user->name !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>E-MAIL : </strong>
                    {!! $user->email !!}
                </div>
            </div>
            &nbsp &nbsp
        </div>
@endsection
