@extends('layouts.auth')

@section('title', 'Lupa password')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <p>Lupa password</p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @if (session()->has('error'))
                    <div class="alert bg-danger text-center">
                        {!! session()->get('error') !!}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert bg-success text-center">
                        {!! session()->get('success') !!}
                    </div>
                @endif
                <div class="text-center my-4">

                </div>
                <p class="login-box-msg">Silahkan inputkan email anda, kami akan mengirim instruksi untuk reset passwordnya
                </p>

                <form action="{{ route('forgetpassword.send') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}" class="text-success">Kembali kehalaman login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
