@extends('layouts.auth')
@section('title', 'Login Siswa')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">Login Siswa</a>
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
                <form action="{{ route('siswa.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="nis" class="form-control" placeholder="NISN Atau Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-graduate"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-dark"> Login
                        </button>
                    </div>
                    <div class="text-right">

                        <small><a href="{{ route('siswa.register') }}">Belum punya akun ?. Daftar sekarang</a></small>
                    </div>
                </form>

                <!-- /.social-auth-links -->

            </div>
        </div>
    </div>
@endsection
