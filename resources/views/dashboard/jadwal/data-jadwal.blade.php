@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="card-title">Data Jadwal</h4>
        <div class="card">
            <div class="card-body">
                
                @if(session()->has('success'))
                <div class="alert alert-success my-3 mx-4 col-lg-8">
                    {{ session('success') }}
                </div>
                @endif

                @can('admin')
                <div class="mx-4">
                    <a href="/add-jadwal"><button type="button" class="btn btn-primary">Buat Jadwal</button></a>
                </div>
                @endcan

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Pengajar</th>
                                <th>Jumlah Jam Pelajaran</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Angkatan</th>
                                <th>Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $jdwl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ isset($jdwl->kegiatan)?$jdwl->kegiatan->nama_kegiatan:'-' }}</td>
                                <td>{{ isset($jdwl->user)?$jdwl->user->name:'-' }}</td>
                                <td>{{ $jdwl->jp }}</td>
                                <td>{{ $jdwl->created_at->format('d-m-Y') }}</td>
                                <td>{{ $jdwl->waktu_mulai }} - {{ $jdwl->waktu_selesai }}</td>
                                <td>{{ $jdwl->angkatan }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="data-jadwal.{{ $jdwl->kegiatan_id }}"><button type="button" class="btn btn-sm mb-1 btn-primary">Lihat</button></a>
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