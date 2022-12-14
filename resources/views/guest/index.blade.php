@extends('layouts.master')
@section('title')
    <title> Tambah Data </title>
@endsection
@section('header')
    <h1>Formulir Daftar Hadir</h1>
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('guest.create') }}" class="btn btn-md btn-success mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-user-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </a>

                        <a href="/guest/cetak" class="btn btn-md btn-success mb-3">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-print"></i>
                            </span>
                            <span class="text">Cetak PDF</span>
                        </a>
                        <table class="table table-bordered" id="tabel_guest">
                            <thead>
                                <tr>
                                    <th scope="col">NIP</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">JENIS KELAMIN(L/P)</th>
                                    <th scope="col">NAMA INSTANSI(OPD)</th>
                                    <th scope="col">JABATAN</th>
                                    <th scope="col">NO.HP</th>
                                    <th scope="col">TTD</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var dt = $('#tabel_guest').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('guest.index') }}',
                columns: [{
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'opds.nama_opd',
                        name: 'opds.nama_opd'
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'signed',
                        name: 'signed'
                    },
                ],
            });
        });
    </script>
@endpush
