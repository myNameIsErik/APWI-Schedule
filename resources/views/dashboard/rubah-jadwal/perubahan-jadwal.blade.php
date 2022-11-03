@extends('layouts.master')
@section('content')
<h4 class="mb-3">Daftar Perubahan Jadwal</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @foreach($jadwal as $jdwl)
                <div class="card-body">
                    @if(Auth::user()->level == 'Admin')
                    <div class="bootstrap-media">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="mt-0">Nama   :</h4>
                                <p>{{ $jdwl->user->name }}<p>
                                <h4 class="mt-0">Tanggal/Waktu :</h4>
                                <p>{{ $jdwl->created_at->format('d-m-Y') }} / {{ $jdwl->waktu_mulai }} - {{ $jdwl->waktu_selesai }}<p>
                                <h4 class="mt-0">Alasan :</h4>
                                <p>{{ $jdwl->alasan }}<p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" class="btn mb-1 btn-primary">Lihat</button>
                                <button type="button" class="btn mb-1 mx-1 btn-warning text-white">Edit</button>
                                <button type="button" class="btn mb-1 btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-12 mt-3 text-left">
                        <h6>Belum Ada Riwayat Perubahan.</h6>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection