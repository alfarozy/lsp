@extends('layouts.backoffice')
@section('title', 'Profile saya')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profil </h1>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-sm-6 col-lg-6">
                                        <h3 class="card-title mt-2 d-none d-md-block">@yield('title')</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session()->has('msg'))
                                    <div class="alert bg-success fade show" role="alert">
                                        {{ session()->get('msg') }}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert bg-danger fade show" role="alert">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('siswa.profile') }}" method="post">
                                    @csrf
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
                                                    <input type="text" name="nomor_telepon"
                                                        value="{{ $data->nomor_telepon }}"
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
                                                    <label>Nis</label>
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
                                                    <label for="jurusan">Jurusan</label>
                                                    <select name="jurusan" id="jurusan"
                                                        class="form-control @error('jurusan') is-invalid @enderror">
                                                        <option value="">Pilih Jurusan </option>
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
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal Lahir</label>
                                                    <div class="input-group date">
                                                        <input type="text" name="tanggal_lahir" id="tanggal"
                                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                            placeholder="Pilih Tanggal Lahir"
                                                            value="{{ $data->tanggal_lahir }}" autocomplete="off">
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
                                                    <input type="text" name="tempat_lahir"
                                                        value="{{ $data->tempat_lahir }}"
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
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
