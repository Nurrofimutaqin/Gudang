<!-- Begin Page Content -->
@extends('layout.layout')
@section('content')
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produksi</h6>
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
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Komoditas</th>
                            <th>Jumlah Produksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Komoditas</th>
                            <th>Jumlah Produksi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($produksi as $ps)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $ps->tanggal }}</td>
                            <td>{{ $ps->komoditas_nama }}</td>
                            <td>{{ $ps->jml_produksi }}</td>
                            <td>
                                <a class="btn btn-primary " href="{{route('produksi.show', $ps->id)}}"><i
                                        class="fa fa-detail"></i> DETAIL</a>
                                <a class="btn btn-warning fa fa-edit" data-bs-toggle="modal"
                                    data-bs-target="#ModalEdit{{ $ps->id }}" href="ModalEdit{{ $ps->id }}"> EDIT</a>
                                <a class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#Modalhapus{{ $ps->id }}" href="Modalhapus{{ $ps->id }}"> HAPUS</a>
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
            <form action="{{route('produksi.store')}}" method='POST'>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4">Tambah Data produksi</h1>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" name="tanggal" placeholder="tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Komoditas</label>
                                    <select name="komoditas_kode" class='form-control'>
                                        <option value="" hidden>----pilih komoditas----</option>

                                        @foreach($komoditas as $km)
                                        <option value="{{$km->komoditas_kode}}">{{$km->komoditas_nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword"
                                        name="jml_produksi" placeholder="Jumlah Produksi....">
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
@foreach($produksi as $ps)
<div class="modal fade" id="ModalEdit{{$ps->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('produksi.update', $ps->id)}}" method='POST'>
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4">Tambah Data produksi</h1>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" name="tanggal" placeholder="tanggal" required
                                        value='{{$ps->tanggal}}'>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Komoditas</label>
                                    <select name="komoditas_kode" class='form-control' required>
                                        <option value="{{$ps->komoditas_kode}}" hidden>{{$ps->komoditas_nama}}</option>

                                        @foreach($komoditas as $km)
                                        <option value="{{$km->komoditas_kode}}">{{$km->komoditas_nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPassword"
                                        name="jml_produksi" placeholder="Jumlah Produksi...."
                                        value="{{$ps->jml_produksi}}" required>
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
@foreach($produksi as $ps)
<div class="modal fade" id="Modalhapus{{$ps->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('produksi.destroy', $ps->id)}}" method='POST'>
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4">Anda Yakin Hapus Data {{$ps->komoditas_nama}}???
                                    </h1>
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