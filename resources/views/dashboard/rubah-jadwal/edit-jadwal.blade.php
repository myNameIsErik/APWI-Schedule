@extends('...layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <h4 class="card-title">Data Jadwal {{ $jadwal->user->name }}</h4>
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="data-ubahJadwal.{{ $jadwal->id }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="row form-material">
                            <div class="col-md-6 mt-4">
                                <label for="tipe_kegiatan">Tipe Jadwal</label> <span class="text-danger">*</span>
                                <select class="form-control" id="tipe_jadwal" name="tipe_jadwal" disabled>
                                    @if ($jadwal->kegiatan_id != null)
                                        <option value="1" selected>Mengajar</option>
                                        <option value="2">Perjalanan Dinas</option>
                                    @else
                                        <option value="1">Mengajar</option>
                                        <option value="2" selected>Perjalanan Dinas</option>
                                    @endif
                                </select>
                            </div>
                            <div id="form_kegiatan" class="col-md-6 mt-4">
                                <label for="kegiatan">Kegiatan</label> <span class="text-danger">*</span>
                                <select class="form-control" id="kegiatan" name="kegiatan_id" disabled>
                                    @foreach($kegiatan as $keg)
                                        @if(old('kegiatan_id', $jadwal->kegiatan_id) == $keg->id)
                                            <option value="{{ $keg->id }}" selected>{{ $keg->nama_kegiatan }}</option>
                                        @else
                                            <option value="{{ $keg->id }}">{{ $keg->nama_kegiatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="pengajar">Tanggal</label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Tanggal Kegiatan" value="{{ old('waktu_mulai', date('Y-m-d', strtotime($jadwal->waktu_mulai))) }}" disabled>
                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div id="form_mulai" class="col-md-4 mt-4">
                                <label for="mulai" class="m-t-20">Jam Mulai</label> <span class="text-danger">*</span>
                                <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="mulai" name="waktu_mulai" placeholder="Check time" value="{{ old('waktu_mulai', date('H:i', strtotime($jadwal->waktu_mulai))) }}" disabled>
                                @error('waktu_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_selesai" class="col-md-4 mt-4">
                                <label for="selesai" class="m-t-20">Jam Selesai</label> <span class="text-danger">*</span>
                                <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="selesai" name="waktu_selesai" placeholder="Check time" value="{{ old('waktu_selesai', date('H:i', strtotime($jadwal->waktu_selesai))) }}" disabled>
                                @error('waktu_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="col-md-12 mt-2">
                                <button id="btn_checkJadwalUpdate" type="button" class="btn btn-info my-2">Check</button><span id="checkSpan" class="ml-2 text-danger" style="display: none;" disabled></span>
                            </div>
                            <div id="form_pengajar" class="col-md-6 mt-2">
                                <label for="pengajar">Pegawai</label> <span class="text-danger">*</span>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Pegawai" name="user_id" list="list-pengajar" id="pengajar" autocomplete="off" value="{{ old('pengajar', $jadwal->user->name) }}" disabled>
                                    <datalist id="list-pengajar">
                                    </datalist>
                                </div>
                            </div>
                            <div id="form_jamPelajaran"class="col-md-3 mt-2">
                                <label for="jp" class="m-t-20">Jumlah Jam Pelajaran</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control @error('jp') is-invalid @enderror" placeholder="" id="jp" name="jp" value="{{ old('jp', $jadwal->jp) }}" readonly="true" disabled>
                                @error('jp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_angkatan" class="col-md-3 mt-2">
                                <label for="angkatan" class="m-t-20">Angkatan</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan" id="angkatan" name="angkatan" value="{{ old('angkatan', $jadwal->angkatan) }}" disabled>
                                @error('angkatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_keterangan" class="col-md-6 mt-4">
                                <label for="angkatan" class="m-t-20">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan" id="keterangan" name="keterangan" rows="3" disabled>{{ old('keterangan', $jadwal->keterangan) }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div id="form_alasan" class="col-md-6 mt-4">
                                <label for="angkatan" class="m-t-20">Alasan</label>
                                <textarea class="form-control @error('alasan') is-invalid @enderror" placeholder="Masukkan Alasan Perubahan Jadwal..." id="alasan" name="alasan" rows="3">{{ old('alasan', $jadwal->alasan) }}</textarea>
                                @error('alasan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_submit" class="col-12 mt-3">
                                <button id="btnSubmit" type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
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