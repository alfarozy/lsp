@extends('layouts.backoffice')
@section('title', 'Update data ')
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
                                    <a href="{{ route('kelas.index') }}" class="btn btn-secondary btn-sm m-1"> <i
                                            class="fa fa-arrow-left"></i>
                                        Kembali</a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('kelas.update', $data->id) }}"
                                enctype="multipart/form-data">
                                <!-- /.card-header -->
                                @method('put')
                                <div class="card-body row">
                                    @csrf
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Nama Kelas </label>
                                            <input type="text" name="nama_kelas"
                                                value="{{ old('nama_kelas') ?? $data->nama_kelas }}"
                                                class="form-control @error('nama_kelas') is-invalid @enderror"
                                                placeholder="Nama Kelas">
                                            @error('nama_kelas')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jurusan">Jurusan</label>
                                            <select name="jurusan_id" id="jurusan_id"
                                                class="form-control @error('jurusan_id') is-invalid @enderror">
                                                <option value="">Pilih Jurusan</option>
                                                @foreach ($jurusan as $j)
                                                    <option value="{{ $j->id }}"
                                                        {{ $data->jurusan->id == $j->id ? 'selected' : '' }}>
                                                        {{ $j->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jurusan_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
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
