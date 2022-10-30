@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="card-title">Data Kegiatan</h4>
        <div class="card">
            <div class="card-body">

                @if(session()->has('success'))
                <div class="alert alert-success my-3 mx-4 col-lg-8">
                    {{ session('success') }}
                </div>
                @endif

                <div class="mx-4">
                    <a href="/add-kegiatan"><button type="button" class="btn btn-info">Tambah Kegiatan</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Jumlah Jam Pelajaran</th>
                                <th>Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatan as $keg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $keg->kode_kegiatan }}</td>
                                <td>{{ $keg->nama_kegiatan }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="editKegiatan-{{ $keg->kode_kegiatan }}"><button type="button" class="btn btn-sm mb-1 btn-warning text-white">Edit</button></a>
                                            <form action="data-kegiatan.{{ $keg->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm mb-1 btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection