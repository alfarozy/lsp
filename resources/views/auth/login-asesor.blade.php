@extends('layouts.auth')
@section('title', 'Login Asesor')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">Login Asesor</a>
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
                <form action="{{ route('asesor.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
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
                        <button type="submit" class="btn btn-block btn-primary"> Login
                        </button>
                    </div>
                </form>

                <!-- /.social-auth-links -->

            </div>
        </div>
    </div>
@endsection
