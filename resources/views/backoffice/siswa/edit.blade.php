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
                                        <a href="{{ route('asesor-siswa.index') }}" class="btn btn-secondary btn-sm m-1"> <i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</a>
                                    @else
                                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm m-1"> <i
                                                class="fa fa-arrow-left"></i>
                                            Kembali</a>
                                    @endif
                                </div>
                            </div>
                            @if (auth('asesor')->check())
                                <form method="POST" action="{{ route('asesor-siswa.update', $data->id) }}"
                                    enctype="multipart/form-data">
                                @else
                                    <form method="POST" action="{{ route('siswa.update', $data->id) }}"
                                        enctype="multipart/form-data">
                            @endif
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Nama lengkap</label>
                                            <input type="text" name="nama" value="{{ $data->nama }}"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Nama lengkap">
                                            @error('nama')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Nomor telpon</label>
                                            <input type="text" name="nomor_telepon" value="{{ $data->nomor_telepon }}"
                                                class="form-control @error('nomor_telepon') is-invalid @enderror"
                                                placeholder="Nomor whatsapp">
                                            @error('nomor_telepon')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @else
                                                <small class="text-muted">Kosongkan jika tidak ingin memperbaharui
                                                    password</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ $data->email }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="text" name="nis" value="{{ $data->nis }}"
                                                class="form-control @error('nis') is-invalid @enderror"
                                                placeholder="Nomor Induk Siswa">
                                            @error('nis')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="kelas_id">Kelas</label>
                                            <select name="kelas_id" id="kelas_id"
                                                class="form-control @error('kelas_id') is-invalid @enderror">
                                                <option value="">Pilih Kelas</option>
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}"
                                                        {{ $data->kelas_id == $k->id ? 'selected' : '' }}>
                                                        {{ $k->nama_kelas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelas_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Lahir</label>
                                            <div class="input-group date">
                                                <input type="text" name="tanggal_lahir" id="tanggal"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    placeholder="Pilih Tanggal Lahir" value="{{ $data->tanggal_lahir }}"
                                                    autocomplete="off">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                            @error('tanggal_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                placeholder="">
                                            @error('tempat_lahir')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L"
                                                    {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                    Laki Laki
                                                </option>
                                                <option value="P"
                                                    {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="" cols="30"
                                                rows="2">{{ $data->alamat }}</textarea>
                                            @error('alamat')
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
