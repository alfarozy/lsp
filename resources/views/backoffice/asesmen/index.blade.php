@extends('layouts.backoffice')
@section('title', 'Data kelas')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Semua Data </h1>
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
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="25%">Ruangan </th>
                                            <th width="15%">Asesor</th>
                                            <th width="25%">Kelas</th>
                                            <th width="15%">Tanggal</th>
                                            <th width="20%" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            @php
                                                $jurusan = \App\Models\Siswa::select('jurusan')
                                                    ->where('kelas_id', $item->kelas_id)
                                                    ->first();
                                                $done = \App\Models\Asesmen::where(['jadwal_id' => $item->id])->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center align-middle">{{ $loop->iteration }}</td>

                                                <td class="align-middle">
                                                    {{ $item->nama_ruangan }}
                                                    <br>
                                                    <span class="text-muted">Sudah dinilai
                                                        {{ $done }} dari
                                                        {{ $item->kelas->siswa->count() }} Siswa</span>
                                                </td>
                                                <td class="align-middle">
                                                    {{ $item->asesor->nama }}
                                                    <br>
                                                    <span class="text-muted">NIP: {{ $item->asesor->nip }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    {{ $item->kelas->nama_kelas }}
                                                    <br>
                                                    <small class="text-muted"> {{ $jurusan->jurusan ?? '' }} </small>
                                                <td class="text-center align-middle">
                                                    {{ $item->tanggal }} <br>
                                                    <span class="text-muted"> Jam {{ $item->jam }} </span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="d-flex justify-content-center">
                                                        @if (auth('asesor')->check())
                                                            <a href="{{ route('asesor-asesmen.show', $item->id) }}"
                                                                class="m-1 btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="Edit data"><i
                                                                    class="fa fa-list"></i> Penilaian</a>
                                                        @else
                                                            <a href="{{ route('asesmen.show', $item->id) }}"
                                                                class="m-1 btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="Edit data"><i
                                                                    class="fa fa-list"></i> Penilaian</a>
                                                        @endif

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
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
