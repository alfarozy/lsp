@extends('layouts.backoffice')
@section('title', 'Detail data')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail data </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title') {{ $data->name }}</li>
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
                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title mt-1">Data siswa</h3>
                                    <div class="right">

                                        @if (auth('asesor')->check())
                                            <a href="{{ route('asesor-siswa.index') }}" class="btn btn-secondary btn-sm"> <i
                                                    class="fa fa-arrow-left"></i>
                                                Kembali</a>
                                        @else
                                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm"> <i
                                                    class="fa fa-arrow-left"></i>
                                                Kembali</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%">Nama Lengkap</th>
                                            <td>{{ $data->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Telepon</th>
                                            <td>{{ $data->nomor_telepon }}</td>
                                        </tr>
                                        <tr>
                                            <th>NIS</th>
                                            <td>{{ $data->nis }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <td>{{ $data->kelas->nama_kelas }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kompetensi keahlian</th>
                                            <td>{{ $data->kelas->jurusan->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>{{ $data->tanggal_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td>{{ $data->tempat_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{ $data->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $data->alamat }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                Daftar Jadwal Siswa
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="25%">Asesor</th>
                                            <th width="15%">Kelas</th>
                                            <th width="20%">Ruangan</th>
                                            <th width="25%">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal as $jdwl)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jdwl->asesor->nama }}</td>
                                                <td>{{ $jdwl->kelas->nama_kelas }}</td>
                                                <td>{{ $jdwl->nama_ruangan }}</td>
                                                <td>{{ $jdwl->tanggal }} Jam {{ $jdwl->jam }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
