@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1>
            Welcome {{ auth()->user()->name }}
        </h1>
    </div>
@endsection