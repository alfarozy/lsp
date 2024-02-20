@extends('layouts.backoffice')
@section('title', 'Data pengguna')
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
                                    <div class="col-sm-6 col-lg-6 text-center text-md-right ">
                                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm m-1"> <i
                                                class="fa fa-plus"></i>
                                            Tambah
                                            Data</a>
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
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->name }}
                                                </td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->created_at->translatedFormat('d-F-Y') }}</td>
                                                <td class="text-center">
                                                    @if ($item->enabled == 1)
                                                        <button class="btn btn-sm btn-success">Aktif</button>
                                                    @else
                                                        <button class="btn btn-sm btn-danger">Tidak aktif</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">

                                                        <a href="{{ route('users.show', $item->id) }}"
                                                            class="m-1 btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Detail data"><i
                                                                class="fa fa-address-card"></i></a>
                                                        <a href="{{ route('users.edit', $item->id) }}"
                                                            class="m-1 btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit data"><i
                                                                class="fa fa-edit"></i></a>
                                                        @if ($item->enabled == 1)
                                                            <a href="{{ route('users.setActive', $item->id) }}"
                                                                class="m-1 ml-2 btn btn-sm btn-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Non aktifkan"><i class="fa fa-times"></i></a>
                                                        @else
                                                            <a href="{{ route('users.setActive', $item->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Aktifkan" class="m-1 ml-2 btn btn-sm btn-success"><i
                                                                    class="fa fa-check"></i></a>
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
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
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
