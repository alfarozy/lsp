@extends('layouts.backoffice')
@section('title', 'Detail data')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data asesor dan penilaian</h1>
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
                                <div class="d-flex justify-content-between">

                                    <h3 class="card-title mt-1">Data siswa untuk dinilai</h3>
                                    <div class="right">
                                        @if (auth('asesor')->check())
                                            <a href="{{ route('asesor-asesmen.index') }}" class="btn btn-secondary btn-sm">
                                                <i class="fa fa-arrow-left"></i>
                                                Kembali</a>
                                        @else
                                            <a href="{{ route('asesmen.index') }}" class="btn btn-secondary btn-sm"> <i
                                                    class="fa fa-arrow-left"></i>
                                                Kembali</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-sm no-border">
                                            <tr>
                                                <th>Asesor</th>
                                                <td>:</td>
                                                <td>{{ $jadwal->asesor->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>:</td>
                                                <td>{{ $jadwal->asesor->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>NIP</th>
                                                <td>:</td>
                                                <td>{{ $jadwal->asesor->nip }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-sm no-border">
                                            <tr>
                                                <th>Total Siswa</th>
                                                <td>:</td>
                                                <td>{{ $jadwal->kelas->siswa->count() }} Siswa</td>
                                            </tr>
                                            <tr>
                                                <th>Belum Dinilai</th>
                                                <td>:</td>
                                                <td>{{ $jadwal->kelas->siswa->count() - $sudahDinilai }} Siswa</td>
                                            </tr>
                                            <tr>
                                                <th>Sudah dinilai</th>
                                                <td>:</td>
                                                <td>{{ $sudahDinilai }} Siswa</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <table id="datatable" class="datatable table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="15%" class="text-center">NIS</th>
                                                <th width="40%">Nama </th>
                                                <th width="15%" class="text-center">Status</th>
                                                <th width="15%" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                @php
                                                    $status = \App\Models\Asesmen::where(['asesor_id' => $jadwal->asesor->id, 'siswa_id' => $item->id])->first();
                                                @endphp
                                                <tr>

                                                    <td class="text-center align-middle">
                                                        {{ $item->nis }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->nama }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if (!isset($status))
                                                            <button class="btn btn-sm btn-secondary">Belum Dinilai</button>
                                                        @elseif($status->status == 'Lulus')
                                                            <button class="btn btn-sm btn-success">Lulus</button>
                                                        @else
                                                            <button class="btn btn-sm btn-danger">Tidak Lulus</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            @if (auth('asesor')->check())
                                                                @if (isset($status))
                                                                    <a href="{{ route('asesor-asesmen.edit', ['asesor_asesman' => $item->id, 'jadwal' => $jadwal->id]) }}"
                                                                        class="m-1 btn btn-sm btn-white border"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Update Nilai"><i
                                                                            class="fa fa-edit"></i>Update
                                                                        Nilai</a>
                                                                @else
                                                                    <a href="{{ route('asesor-asesmen.edit', ['asesor_asesman' => $item->id, 'jadwal' => $jadwal->id]) }}"
                                                                        class="m-1 btn btn-sm btn-primary"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Tambah Nilai"><i class="fa fa-plus"></i>
                                                                        Nilai
                                                                        sekarang</a>
                                                                @endif
                                                            @else
                                                                @if (isset($status))
                                                                    <a href="{{ route('asesmen.edit', ['asesman' => $item->id, 'jadwal' => $jadwal->id]) }}"
                                                                        class="m-1 btn btn-sm btn-white border"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Update Nilai"><i
                                                                            class="fa fa-edit"></i>Update
                                                                        Nilai</a>
                                                                @else
                                                                    <a href="{{ route('asesmen.edit', ['asesman' => $item->id, 'jadwal' => $jadwal->id]) }}"
                                                                        class="m-1 btn btn-sm btn-primary"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Tambah Nilai"><i class="fa fa-plus"></i>
                                                                        Nilai
                                                                        sekarang</a>
                                                                @endif
                                                            @endif

                                                            {{-- <a href="{{ route('kelas.edit', $item->id) }}"
                                                                class="m-1 btn btn-sm btn-success"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Edit data"><i class="fa fa-edit"></i> Nilai sekarang</a> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
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
