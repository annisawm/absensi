@extends('layouts.master')
@section('title')
    <title> Tambah Data </title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection
@section('header')
    <h1>Formulir Daftar Hadir</h1>
@endsection
@section('subheader')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Formulir Daftar Hadir</li>
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
                        <form action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Status Kepegawaian</label>
                                <!-- error message untuk title -->
                                <select name="status" id="status">
                                    <option value="0">Pilih</option>
                                    <option value="1">PNS</option>
                                    <option value="2">Non PNS</option>
                                </select>
                                @error('nip')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NIP</label>
                                <input type="text" id="nip" disabled
                                       class="form-control @error('nip') is-invalid @enderror" name="nip"
                                       value="{{ old('nip') }}" placeholder="Masukkan NIP">

                                <!-- error message untuk title -->
                                @error('nip')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                       name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">

                                <!-- error message untuk title -->
                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                            <label class="font-weight-bold">JENIS KELAMIN</label>
                            <input type="text"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                name="jenis_kelamin" value="{{ old('jenis_kelamin') }}"
                                placeholder="Masukkan L/P">

                            <!-- error message untuk title -->
                            @error('jenis_kelamin')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                            <div class="form-group">
                                <label class="font-weight-bold">JENIS KELAMIN</label>
                                <br>
                                <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
                                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
                            </div>

                            <div class="form-group">
                                <label for="opd_kode">NAMA INSTANSI</label>
                                <br>
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
                                <label class="font-weight-bold">NO.HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                       name="no_hp" value="{{ old('no_hp') }}" placeholder="Masukkan No.HP">

                                <!-- error message untuk title -->
                                @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            {{--                            <div class="form-group">--}}
                            {{--                                <label class="font-weight-bold">TTD</label>--}}
                            {{--                                <input type="text" class="form-control @error('ttd') is-invalid @enderror"--}}
                            {{--                                       name="ttd" value="{{ old('ttd') }}" placeholder="Masukkan TTD">--}}

                            {{--                                <!-- error message untuk title -->--}}
                            {{--                                @error('ttd')--}}
                            {{--                                <div class="alert alert-danger mt-2">--}}
                            {{--                                    {{ $message }}--}}
                            {{--                                </div>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}



                            {{--                            <div class="form-group">--}}
                            {{--                                <label class="" for="">TTD</label>--}}
                            {{--                                <form method="POST" action="{{ url('signature-pad') }}">--}}
                            {{--                                    <div id="signature-pad" class="m-signature-pad">--}}
                            {{--                                        <div class="m-signature-pad--body">--}}
                            {{--                                            <canvas style="border: 2px dashed #ccc"></canvas>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </form>--}}
                            {{--                            </div>--}}

                            <div class="form-group">
                                <label class="" for="">TTD</label>
                                @csrf
                                <div class="col-md-3">
                                    <div id="signature-pad"></div>
                                    <br/>
                                    <button id="clear" class="btn btn-danger btn-sm">Hapus</button>
                                    <textarea id="signature64" name="signed" style="display: none"></textarea>
                                </div>
                            </div>

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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script>
        $("#status").change(function () {
            var id = $(this).val();
            // if (id==1){
            //     $('#nip').prop("disabled", false);
            // } else if(id==2){
            //     $('#nip').prop("disabled", true);
            // } else if(id==0){
            //     $('#nip').prop("disabled", true);
            // }

            // TERNARY CONDITION
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


    <script type="text/javascript">
        var sig = $('#signature-pad').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function (e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
@endpush


