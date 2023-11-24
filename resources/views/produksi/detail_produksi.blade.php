@extends('layout.layout')
@section('content')
<div class="container-fluid mt-1">
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive mt-4">
        <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Komoditas</th>
                    <th>Jumlah Produksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Komoditas</th>
                    <th>Jumlah Produksi</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->komoditas_nama }}</td>
                    <td>{{ $p->jml_produksi }}</td>
                </tr>


            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection