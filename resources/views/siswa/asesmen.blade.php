@extends('layouts.backoffice')
@section('title', 'Data Hasil kelulusan')
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
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="20%">Ruangan </th>
                                            <th width="20%">Asesor</th>
                                            <th width="15%">Kelas</th>
                                            <th width="15%">Tanggal</th>
                                            <th width="20%">Status</th>
                                            <th width="20%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            @php
                                                $status = \App\Models\Asesmen::where(['asesor_id' => $item->asesor_id, 'siswa_id' => $item->id, 'jadwal_id' => $item->id])->first();
                                            @endphp
                                            <tr>
                                                <td class="text-center align-middle">{{ $loop->iteration }}</td>

                                                <td class="align-middle">
                                                    {{ $item->nama_ruangan }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $item->asesor->nama }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $item->kelas->nama_kelas }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->tanggal }} <br> Jam {{ $item->jam }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if (!isset($status))
                                                        <button class="btn btn-sm btn-secondary">Belum Dinilai</button>
                                                    @elseif($status->status == 'Kompeten')
                                                        <button class="btn btn-sm btn-success">Kompeten</button>
                                                    @else
                                                        <button class="btn btn-sm btn-danger">Tidak Kompeten</button>
                                                    @endif
                                                </td>
                                                <td class="align-middle">
                                                    @if (isset($status) && $status->status == 'Kompeten')
                                                        {{ $status->description }}
                                                    @endif
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
