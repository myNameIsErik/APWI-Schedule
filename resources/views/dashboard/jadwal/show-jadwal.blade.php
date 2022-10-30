@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center mb-4">
                    <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                    <div class="media-body">
                        <h3 class="mb-0">Kegiatan: {{ $jadwal->kegiatan->nama_kegiatan }}</h3>
                        <p class="text-muted mb-0">Pengajar: {{ $jadwal->user->name }}</p>
                    </div>
                </div>
                
                <div class="row mb-5">
                    <div class="col-12">
                        <h3 class="mb-0">Tanggal: {{ $jadwal->tanggal->format('d-m-Y') }}</h3>
                        <button class="btn btn-success px-5" disabled>Pukul: {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</button>
                    </div>
                </div>

                <h4>{{ $jadwal->nip }}</h4>
                <ul class="card-profile__info">
                    <li class="mb-1"><strong class="text-dark mr-4"></strong> <span>Jumlah Jam Pelajaran: {{ $jadwal->jp }}</span></li>
                    <li><strong class="text-dark mr-4">Angkatan</strong> <span>{{ $jadwal->angkatan }}</span></li>
                </ul>

                <a href="{{ $jadwal->id }}.edit"><button type="button" class="btn btn-sm mb-1 btn-warning">Edit</button></a>
                <form action="data-jadwal.{{ $jadwal->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm mb-1 btn-danger">Hapus</button>
                </form>
            </div>
        </div>  
    </div>
</div>
@endsection