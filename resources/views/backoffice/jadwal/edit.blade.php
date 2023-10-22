@extends('layouts.backoffice')
@section('title', 'Update data ')
@section('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title mt-2">@yield('title')</h3>
                                    @if (auth('asesor')->check())
                                        <a href="{{ route('asesor-jadwal.index') }}" class="btn btn-secondary btn-sm m-1">
                                            <i class="fa fa-arrow-left"></i>
                                            Kembali</a>
                                    @else
                                        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary btn-sm m-1"> <i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</a>
                                    @endif
                                </div>
                            </div>
                            @if (auth('asesor')->check())
                                <form method="POST" action="{{ route('asesor-jadwal.update', $data->id) }}"
                                    enctype="multipart/form-data">
                                @else
                                    <form method="POST" action="{{ route('jadwal.update', $data->id) }}"
                                        enctype="multipart/form-data">
                            @endif
                            <!-- /.card-header -->
                            @method('put')
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nama ruangan </label>
                                            <input type="text" name="nama_ruangan"
                                                value="{{ old('nama_ruangan') ?? $data->nama_ruangan }}"
                                                class="form-control @error('nama_ruangan') is-invalid @enderror"
                                                placeholder="Nama ruangan">
                                            @error('nama_ruangan')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="asesor_id">Asesor</label>
                                            @if (auth('asesor')->check())
                                                <input class="form-control" type="text" name=""
                                                    value="{{ auth('asesor')->user()->nama }}" readonly>
                                                <input type="hidden" name="asesor_id" value="{{ auth()->id() }}">
                                            @else
                                                <select name="asesor_id" id="asesor_id"
                                                    class="form-control @error('asesor_id') is-invalid @enderror">
                                                    <option value="">Pilih Asesor</option>
                                                    @foreach ($asesors as $asesor)
                                                        <option value="{{ $asesor->id }}"
                                                            {{ old('asesor_id') == $asesor->id ? 'selected' : '' }}>
                                                            {{ $asesor->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('asesor_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="kelas_id">Kelas</label>
                                            <select name="kelas_id" id="kelas_id"
                                                class="form-control @error('kelas_id') is-invalid @enderror">
                                                <option value="">Pilih Kelas</option>
                                                @foreach ($kelas as $kelas)
                                                    <option value="{{ $kelas->id }}"
                                                        {{ $data->kelas_id == $kelas->id ? 'selected' : '' }}>
                                                        {{ $kelas->nama_kelas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelas_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <div class="input-group date">
                                                <input type="text" name="tanggal" id="tanggal"
                                                    class="form-control @error('tanggal') is-invalid @enderror"
                                                    placeholder="Pilih Tanggal"
                                                    value="{{ old('tanggal') ?? $data->tanggal }}" autocomplete="off">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                            @error('tanggal')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Waktu </label>
                                            <input type="text" id="timepicker" name="jam"
                                                value="{{ old('jam') ?? $data->jam }}"
                                                class="form-control @error('jam') is-invalid @enderror"
                                                placeholder="Pilih Waktu">
                                            @error('jam')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success col-md-3 mx-2">Submit</button>
                            </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#tanggal').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true
            });
            $(document).ready(function() {
                $('#timepicker').timepicker({
                    minuteStep: 1,
                    showSeconds: false,
                    showMeridian: false,
                    explicitMode: true
                });
            });

        });
    </script>

@endsection
