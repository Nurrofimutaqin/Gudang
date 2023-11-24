<!-- Begin Page Content -->
@extends('layout.layout')
@section('content')
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        
                        <tr>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Komoditas</th>
                            <th>Jumlah Produksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Bullan</th>
                            <th>Tahun</th>
                            <th>Komoditas</th>
                            <th>Jumlah Produksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($produksi as $ps)
                        <tr>
                            <td>{{ $ps->bulan }}</td>
                            <td>{{ $ps->tahun }}</td>
                            <td>{{ $ps->komoditas_nama }}</td>
                            <td>{{ $ps->total }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection