@extends('layouts.backoffice')
@section('title', 'Data jadwal')
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
                    <div class="col-lg-12">
                        <div class="card collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Filter / Cari data</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('laporan.asesmen') }}" method="get">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kelas <span class="text-muted">(opsional)</span></label>
                                                <select name="kelas_id" class="form-control">
                                                    <option value="" disabled
                                                        {{ !request()->enabled ? 'selected' : '' }}>
                                                        Pilih kelas</option>
                                                    @foreach ($kelas as $item)
                                                        <option {{ $item->id == request()->kelas_id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">
                                                            {{ $item->nama_kelas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status <span class="text-muted">(opsional)</span></label>
                                                <select name="status" class="form-control">
                                                    <option value="" disabled
                                                        {{ !request()->status ? 'selected' : '' }}>
                                                        Pilih status</option>
                                                    <option {{ request()->status == 'Kompeten' ? 'selected' : '' }}
                                                        value="Kompeten">
                                                        Kompeten
                                                    </option>
                                                    <option {{ request()->status == 'Tidak Kompeten' ? 'selected' : '' }}
                                                        value="Tidak Kompeten">
                                                        Tidak Kompeten
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">

                                        <button class="btn btn-primary" type="submit"> <i class="fa fa-filter"></i>
                                            Filter data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-sm-6 col-lg-6">

                                        <h3 class="card-title mt-2 d-none d-md-block">@yield('title')</h3>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 text-center text-md-right ">
                                        @if (auth('asesor')->check())
                                            <a href="{{ route('asesor.laporan.asesmen.export.pdf', ['status' => request()->status, 'kelas_id' => request()->kelas_id]) }}"
                                                class="btn btn-outline-danger btn-sm m-1"> <i class="fa fa-file-pdf"></i>
                                                Export PDF</a>
                                            <a href="{{ route('asesor.laporan.asesmen.export', ['status' => request()->status, 'kelas_id' => request()->kelas_id]) }}"
                                                class="btn btn-outline-success btn-sm m-1"> <i class="fa fa-file-excel"></i>
                                                Export</a>
                                        @else
                                            <a href="{{ route('laporan.asesmen.export.pdf', ['status' => request()->status, 'kelas_id' => request()->kelas_id]) }}"
                                                class="btn btn-outline-danger btn-sm m-1"> <i class="fa fa-file-pdf"></i>
                                                Export PDF</a>
                                            <a href="{{ route('laporan.asesmen.export', ['status' => request()->status, 'kelas_id' => request()->kelas_id]) }}"
                                                class="btn btn-outline-success btn-sm m-1"> <i class="fa fa-file-excel"></i>
                                                Export Excel</a>
                                        @endif
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
                                @if (isset($errors) && $errors->any())
                                    <div class="alert bg-danger fade show" role="alert">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>Nama Lengkap</th>
                                            <th>NISN</th>
                                            <th>Jadwal</th>
                                            <th>Ruangan</th>
                                            <th class="text-center">Status Kelulusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->siswa->kelas->nama_kelas }}
                                                </td>
                                                <td>
                                                    {{ $item->siswa->nama }}
                                                </td>
                                                <td>
                                                    {{ $item->siswa->nis }}
                                                </td>
                                                <td>{{ $item->jadwal->tanggal }}</td>
                                                <td>{{ $item->jadwal->nama_ruangan }}</td>
                                                <td class="text-center">
                                                    @if ($item->status == 'Kompeten')
                                                        <button class="btn btn-sm btn-success">Kompeten</button>
                                                    @else
                                                        <button class="btn btn-sm btn-danger">Tidak Kompeten</button>
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

    <!-- modal import -->
    <div class="modal fade" id="import" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Import data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="text-center">

                            <a href="{{ route('users.download') }}" class="btn btn-info  btn-sm"><i
                                    class="fa fa-file-excel"></i> Download
                                template
                                excel</a>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="exampleInputFile">Import file </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input"
                                        id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih File excel</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-arrow-left"></i> Batal</button>
                        <button type="submit" class="btn btn-success">Import sekarang</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
