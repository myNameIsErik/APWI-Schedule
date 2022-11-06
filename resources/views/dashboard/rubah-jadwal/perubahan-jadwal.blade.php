@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="">Perubahan Jadwal</h4>
        <div class="card">
            <div class="card-body">
                
                @if(session()->has('success'))
                <div class="alert alert-success my-3 mx-4 col-lg-8">
                    {{ session('success') }}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger my-3 mx-4 col-lg-8">
                    {{ session('error') }}
                </div>
                @endif

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
                                <td>
                                    @if ($jdwl->tipe_jadwal == 2)
                                        Perjalanan Dinas
                                    @else
                                        {{ $jdwl->kegiatan->nama_kegiatan }}
                                    @endif
                                </td>
                                <td>{{ isset($jdwl->user)?$jdwl->user->name:'-' }}</td>
                                <td>
                                    @if($jdwl->jp < 15)
                                        {{ $jdwl->jp }}
                                    @else
                                        Full Day
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($jdwl->waktu_mulai)); }}</td>
                                
                                <td>{{ date('H:i', strtotime($jdwl->waktu_mulai)) }} - {{ date('H:i', strtotime($jdwl->waktu_selesai)) }}</td>
                                <td>{{ isset($jdwl->angkatan)?$jdwl->angkatan:'-' }}</td>
                                <td>
                                    @if(Auth::user()->level == 'Admin')
                                    <div class="row">
                                        <div class="col-lg-12" style="white-space: nowrap">
                                            <a href="editJadwal-{{ $jdwl->id }}"><button t  ype="button" class="btn btn-sm mb-1 btn-success text-white"><i class="bi bi-pencil-square"></i> Edit</button></a>
                                            <form action="tolak-jadwal.{{ $jdwl->id }}" method="post" class="d-inline">
                                                @method('patch')
                                                @csrf
                                                <button type="submit" class="btn btn-sm mb-1 btn-warning text-white"><i class="bi bi-dash-circle"></i> Tolak</button>
                                            </form>
                                            <form action="data-jadwal.{{ $jdwl->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm mb-1 btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                    @elseif(Auth::user()->level == 'User')
                                        <button type="button" class="btn btn-sm mb-1 btn-warning text-white" style="pointer-events: none">Dalam Pengecekan</button>
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