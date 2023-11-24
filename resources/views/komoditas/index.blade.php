<!-- Begin Page Content -->
@extends('layout.layout')
@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Komoditas</h6>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">
                Tambah data
            </button>
            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Komoditas</th>
                            <th>Nama Komoditas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kode Komoditas</th>
                            <th>Nama Komoditas</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($komoditas as $km)
                        <tr>
                            <td>{{ $km->komoditas_kode }}</td>
                            <td>{{ $km->komoditas_nama }}</td>
                            <td>
                                <a class="btn btn-primary " href="{{route('komoditas.show', $km->id)}}"><i class="fa fa-detail"></i> DETAIL</a>
                                <a class="btn btn-warning fa fa-edit" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $km->id }}" href="ModalEdit{{ $km->id }}" > EDIT</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modalhapus{{ $km->id }}" href="Modalhapus{{ $km->id }}" > HAPUS</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<!-- Modal untuk tambah data -->
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('komoditas.store')}}" method='POST'>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4">Tambah Data Komoditas</h1>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" name="komoditas_kode"
                                        class="@error('komoditas_kode') is-invalid @enderror"
                                        placeholder="Kode Komoditas... " value="{{$kode}} "required readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword"
                                        name="komoditas_nama" placeholder="Nama Komoditas" required>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fa fa-save"> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data -->
@foreach($komoditas as $km)
<div class="modal fade" id="ModalEdit{{$km->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('komoditas.update', $km->id)}}" method='POST'>
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4">Edit Data Komoditas</h1>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" name="komoditas_kode"
                                        placeholder="Kode Komoditas..." value="{{$km->komoditas_kode}}" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword"
                                        name="komoditas_nama" placeholder="Nama Komoditas.."value="{{$km->komoditas_nama}}" required>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fa fa-save"> Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- End of Main Content -->
@foreach($komoditas as $km)
<div class="modal fade" id="Modalhapus{{$km->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('komoditas.destroy', $km->id)}}" method='POST'>
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4">Anda Yakin Hapus Data {{$km->komoditas_nama}}???</h1>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fa fa-save"> Hapus Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection