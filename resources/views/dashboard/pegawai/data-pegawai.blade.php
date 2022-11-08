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
                    <a href="/add-pegawai"><button type="button" class="btn btn-primary"><i class="bi bi-person-plus"></i> Tambah Pegawai</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Pangkat-Gol/Ruang</th>
                                <th>Email</th>
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
                                <td>{{ $pgw->jabatan }}</td>
                                <td>{{ isset($pgw->golongan)?$pgw->golongan->nama_pangkat:'- ' }} - {{ isset($pgw->golongan)?$pgw->golongan->jenis_golongan:'- ' }}/{{ isset($pgw->golongan)?$pgw->golongan->ruang:' -' }}</td>
                                <td>{{ isset($pgw->email)?$pgw->email:'-' }}</td>
                                <td class="text-center">
                                    @if($pgw->status_anggota == 1)
                                        <button type="button" class="btn btn-success btn-sm text-white">Aktif</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm text-white">Tidak Aktif</button>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="data-pegawai-{{ $pgw->nip }}"><button type="button" class="btn btn-sm mb-1 btn-primary"><i class="bi bi-eye"></i> Lihat</button></a>
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