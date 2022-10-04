@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kelas</h4>
                <div class="text-right">
                    <a href="/add-jadwal"><button type="button" class="btn btn-primary">Buat Jadwal</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                                
                            </tr>
                        </thead>
                        @foreach($kelas as $kls)
                        <tbody>
                            <tr>
                                <td>{{ $kls->id }}</td>
                                <td>{{ $kls->kode_kelas }}</td>
                                <td>{{ $kls->nama_kelas }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-sm mb-1 btn-primary">Lihat</button>
                                            <button type="button" class="btn btn-sm mb-1 btn-warning">Edit</button>
                                            <button type="button" class="btn btn-sm mb-1 btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection