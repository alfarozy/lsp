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
                                    <a href="{{ route('asesor.index') }}" class="btn btn-secondary btn-sm m-1"> <i
                                            class="fa fa-arrow-left"></i>
                                        Kembali</a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('asesor.update', $data->id) }}"
                                enctype="multipart/form-data">
                                <!-- /.card-header -->
                                @method('put')
                                <div class="card-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Nama lengkap </label>
                                                <input type="text" name="nama"
                                                    value="{{ old('nama') ?? $data->nama }}"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="Nama lengkap">
                                                @error('nama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>NIP </label>
                                                <input type="text" name="nip" value="{{ old('nip') ?? $data->nip }}"
                                                    class="form-control @error('nip') is-invalid @enderror"
                                                    placeholder="Nip">
                                                @error('nip')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Jurusan </label>
                                                <select name="jurusan" id="jurusan"
                                                    class="form-control @error('jurusan') is-invalid @enderror">
                                                    <option value="">Pilih Jurusan</option>
                                                    @foreach ($jurusan as $j)
                                                        <option value="{{ $j }}"
                                                            {{ $data->jurusan == $j ? 'selected' : '' }}>
                                                            {{ $j }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jurusan')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Email </label>
                                                <input type="text" name="email"
                                                    value="{{ old('email') ?? $data->email }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Password </label>
                                                <input type="text" name="password" value="{{ old('password') }}"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="password">
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @else
                                                    <small class="text-muted">Kosongkan jika tidak ingin memperbaharui
                                                        password</small>
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
