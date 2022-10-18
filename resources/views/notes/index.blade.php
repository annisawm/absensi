@extends('layouts.master')
@section('header')
    <h1>Notulensi Kegiatan</h1>
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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Judul Notulensi</th>
            <th>Acara/Kegiatan</th>
            <th>Tanggal Kegiatan</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($notes as $note)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ $note->judul }}</td>
                <td>{{ $note->programs->acara }}</td>
                <td>{{ $note->programs->tanggal }}</td>
                <td class="text-center">
                    <form action="{{ route('notes.destroy',$note->id) }}" method="POST">

                        <a class="btn btn-info btn-sm" href="{{ route('notes.show',$note->id) }}">View</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('notes.edit',$note->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $notes->links() !!}

@endsection
