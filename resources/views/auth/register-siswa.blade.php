@extends('layouts.auth')
@section('title', 'Register Siswa')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">Register Siswa</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @if (session()->has('msg'))
                    <div class="alert bg-danger text-center">
                        {!! session()->get('msg') !!}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert bg-success text-center">
                        {!! session()->get('success') !!}
                    </div>
                @endif
                <div class="text-center my-4">

                </div>
                <form action="{{ route('siswa.register') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama lengkap </label>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror" placeholder="Nama lengkap">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nis </label>
                                <input type="text" name="nis" value="{{ old('nis') }}"
                                    class="form-control @error('nis') is-invalid @enderror" placeholder="Nomor Induk Siswa">
                                @error('nis')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nomor telpon </label>
                                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                                    class="form-control @error('nomor_telepon') is-invalid @enderror"
                                    placeholder="Nomor whatsapp">
                                @error('nomor_telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                        Laki Laki
                                    </option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
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
                                <label>Password</label>
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" id="kelas_id"
                                    class="form-control @error('kelas_id') is-invalid @enderror">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $kelas)
                                        <option value="{{ $kelas->id }}"
                                            {{ old('kelas_id') == $kelas->id ? 'selected' : '' }}>
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
                                <label for="tanggal">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <input type="text" width="100%" name="tanggal_lahir" id="tanggal"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        placeholder="Pilih Tanggal " value="{{ old('tanggal_lahir') }}" autocomplete="off">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                @error('tanggal_lahir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tempat Lahir </label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="">
                                @error('tempat_lahir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Alamat </label>
                                <textarea class="form-control @error('jenis_kelamin') is-invalid @enderror" name="alamat" id="" cols="30"
                                    rows="2"></textarea>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-dark"> Register
                        </button>
                    </div>
                    <div class="text-right">

                        <small><a href="{{ route('siswa.login') }}">Sudah punya akun ?. Login sekarang</a></small>
                    </div>
                </form>

                <!-- /.social-auth-links -->

            </div>
        </div>
    </div>
@endsection
