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
                    <a href="/add-jadwal"><button type="button" class="btn btn-primary"><i class="bi bi-calendar-plus"></i> Buat Jadwal</button></a>
                </div>
                @endcan

                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Pegawai</th>
                                <th>Jumlah JP</th>
                                <th>Tanggal Kegiatan</th>
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
                                    @can('admin')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="{{ $jdwl->id }}.edit"><button type="button" class="btn btn-sm mb-1 btn-warning text-white"><i class="bi bi-pencil-square"></i> Edit</button></a>
                                            <form action="data-jadwal.{{ $jdwl->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm mb-1 btn-danger"><i class="bi bi-dash-circle"></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endcan
                                    @if(Auth::user()->level == 'User')
                                        <a href="{{ $jdwl->id }}.edit"><button type="button" class="btn btn-sm mb-1 btn-danger text-white">Request Ubah Jadwal</button></a>
                                    @endif
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