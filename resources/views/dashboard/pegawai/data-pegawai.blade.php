@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="card-title">Data Pegawai</h4>
        <div class="card">
            <div class="card-body">

                @if(session()->has('success'))
                <div class="alert alert-success my-3 mx-4 col-lg-8">
                    {{ session('success') }}
                </div>
                @endif

                <div class="mx-4">
                    <a href="/add-pegawai"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $pgw)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pgw->nip }}</td>
                                <td>{{ $pgw->name }}</td>
                                <td>{{ $pgw->username }}</td>
                                <td>{{ $pgw->email }}</td>
                                <td>{{ $pgw->phone }}</td>
                                <td>{{ $pgw->status->status_name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="data-pegawai.{{ $pgw->username }}"><button type="button" class="btn btn-sm mb-1 btn-primary">Lihat</button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection