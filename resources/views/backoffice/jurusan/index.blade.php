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
                                    <div class="col-sm-6 col-lg-6 text-center text-md-right ">
                                        <a href="{{ route('jurusan.create') }}" class="btn btn-success btn-sm m-1"> <i
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
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="35%">Jurusan </th>
                                            <th width="15%">Status</th>
                                            <th width="15%" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle">{{ $loop->iteration }}</td>

                                                <td class="align-middle">
                                                    {{ $item->nama }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($item->enabled == 1)
                                                        <button class="btn btn-sm btn-success">Aktif</button>
                                                    @else
                                                        <button class="btn btn-sm btn-danger">Tidak aktif</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('jurusan.edit', $item->id) }}"
                                                            class="m-1 btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit data"><i
                                                                class="fa fa-edit"></i></a>

                                                        @if ($item->enabled == 1)
                                                            <a href="{{ route('jurusan.setActive', $item->id) }}"
                                                                class="m-1 ml-2 btn btn-sm btn-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Non aktifkan"><i class="fa fa-times"></i></a>
                                                        @else
                                                            <a href="{{ route('jurusan.setActive', $item->id) }}"
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

@endsection
