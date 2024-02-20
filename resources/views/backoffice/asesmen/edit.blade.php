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
                                        <a href="{{ route('asesor-asesmen.show', $jadwal->id) }}"
                                            class="btn btn-secondary btn-sm m-1">
                                            <i class="fa fa-arrow-left"></i>
                                            Kembali</a>
                                    @else
                                        <a href="{{ route('asesmen.show', $jadwal->id) }}"
                                            class="btn btn-secondary btn-sm m-1">
                                            <i class="fa fa-arrow-left"></i>
                                            Kembali</a>
                                    @endif
                                </div>
                            </div>
                            @if (!isset($data))
                                @if (auth('asesor')->check())
                                    <form method="POST" action="{{ route('asesor-asesmen.store') }}"
                                        enctype="multipart/form-data">
                                    @else
                                        <form method="POST" action="{{ route('asesmen.store') }}"
                                            enctype="multipart/form-data">
                                @endif
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @csrf
                                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Asesor </label>
                                                <input type="hidden" name="asesor_id" value="{{ $jadwal->asesor->id }}">
                                                <input type="text" readonly value="{{ $jadwal->asesor->nama }}"
                                                    class="form-control bg-white">
                                                @error('asesor_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Siswa </label>
                                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                                <input type="text" readonly value="{{ $siswa->nama }}"
                                                    class="form-control bg-white">
                                                @error('siswa_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                    <option value="Kompeten">Kompeten</option>
                                                    <option value="Tidak Kompeten">Tidak Kompeten</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Deskripsi (opsional)</label>
                                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success col-md-3 mx-2">Submit</button>
                                </div>
                                </form>
                            @else
                                @if (auth('asesor')->check())
                                    <form method="POST" action="{{ route('asesor-asesmen.update', $data->id) }}"
                                        enctype="multipart/form-data">
                                    @else
                                        <form method="POST" action="{{ route('asesmen.update', $data->id) }}"
                                            enctype="multipart/form-data">
                                @endif

                                <!-- /.card-header -->
                                @method('put')
                                <div class="card-body">
                                    @csrf
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Asesor</label>
                                                <input type="hidden" name="asesor_id" value="{{ $jadwal->asesor->id }}">
                                                <input type="text" readonly value="{{ $jadwal->asesor->nama }}"
                                                    class="form-control bg-white">
                                                @error('asesor_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Siswa</label>
                                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                                <input type="text" readonly value="{{ $siswa->nama }}"
                                                    class="form-control bg-white">
                                                @error('siswa_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                    <option value="Kompeten"
                                                        {{ $data->status == 'Kompeten' ? 'selected' : '' }}>Kompeten
                                                    </option>
                                                    <option value="Tidak Kompeten"
                                                        {{ $data->status == 'Tidak Kompeten' ? 'selected' : '' }}>Tidak
                                                        Kompeten</option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Deskripsi (opsional)</label>
                                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $data->description }}</textarea>
                                                @error('description')
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
                            @endif

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
