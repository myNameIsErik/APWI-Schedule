@extends('...layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="/add-jadwal" method="post">
                        @csrf
                        <div class="row form-material">
                            <div class="col-md-6 mt-1">
                                <label for="kegiatan">Kegiatan</label>
                                <select class="form-control" id="kegiatan" name="kegiatan_id">
                                    @foreach($kegiatan as $keg)
                                        @if(old('kegiatan_id') == $keg->id)
                                            <option value="{{ $keg->id }}" selected>{{ $keg->nama_kegiatan }}</option>
                                        @else
                                            <option value="{{ $keg->id }}">{{ $keg->nama_kegiatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="pengajar">Pengajar</label>
                                <select class="form-control" id="pengajar" name="user_id">
                                    @foreach($pegawai as $pgw)
                                        @if(old('kegiatan_id') == $keg->id)
                                            <option value="{{ $pgw->id }}" selected>{{ $pgw->name }}</option>
                                        @else
                                            <option value="{{ $pgw->id }}">{{ $pgw->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="mulai" class="m-t-20">Jam Mulai</label>
                                <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="mulai" name="waktu_mulai" placeholder="Check time" value="{{ old('waktu_mulai') }}">
                                @error('waktu_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="selesai" class="m-t-20">Jam Selesai</label>
                                <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="selesai" name="waktu_selesai" placeholder="Check time" value="{{ old('waktu_selesai') }}">
                                @error('waktu_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="jp" class="m-t-20">Jumlah Jam Pelajaran</label>
                                <input type="text" class="form-control @error('jp') is-invalid @enderror" placeholder="" id="jp" name="jp" value="{{ old('jp') }}">
                                @error('jp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="angkatan" class="m-t-20">Angkatan</label>
                                <input type="text" class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan" id="angkatan" name="angkatan" value="{{ old('angkatan') }}">
                                @error('angkatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    const kegiatan = document.querySelector('#kegiatan');
    const jp = document.querySelector('#jp');

    kegiatan.addEventListener('change', function() {
        fetch('/add-data/checkJP?kegiatan=' + kegiatan.value)
        .then(response => response.json())
        .then(data => jp.value = data.jp)
    });
</script> --}}
@endsection