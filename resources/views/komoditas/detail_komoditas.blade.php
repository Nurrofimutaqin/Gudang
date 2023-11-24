@extends('layout.layout')
@section('content')
<div class="container-fluid mt-1">
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive mt-4">



    
        <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Kode Komoditas</th>
                    <th>Nama Komoditas</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Kode Komoditas</th>
                    <th>Nama Komoditas</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>{{ $komoditas->komoditas_kode }}</td>
                    <td>{{ $komoditas->komoditas_nama }}</td>
                </tr>


            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection