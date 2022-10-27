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
                                <label for="tipe_kegiatan">Tipe Jadwal</label>
                                <select class="form-control" id="tipe_jadwal" name="tipe_jadwal">
                                    <option value="1" selected>Mengajar</option>
                                    <option value="2">Perjalanan Dinas</option>
                                </select>
                            </div>
                            <div id="form_kegiatan" class="col-md-6 mt-1">
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
                                <label for="pengajar">Pegawai</label>
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
                            <div class="col-md-6 mt-1">
                                <label for="pengajar">Tanggal</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker" placeholder="bulan/tanggal/tahun"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                </div>
                            </div>
                            <div id="form_mulai" class="col-md-6 mt-1">
                                <label for="mulai" class="m-t-20">Jam Mulai</label>
                                <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="mulai" name="waktu_mulai" placeholder="Check time" value="{{ old('waktu_mulai') }}">
                                @error('waktu_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_selesai" class="col-md-6 mt-1">
                                <label for="selesai" class="m-t-20">Jam Selesai</label>
                                <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="selesai" name="waktu_selesai" placeholder="Check time" value="{{ old('waktu_selesai') }}">
                                @error('waktu_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_jamPelajaran"class="col-md-4 mt-1">
                                <label for="jp" class="m-t-20">Jumlah Jam Pelajaran</label>
                                <input type="text" class="form-control @error('jp') is-invalid @enderror" placeholder="" id="jp" name="jp" value="{{ old('jp') }}">
                                @error('jp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_angkatan" class="col-md-4 mt-1">
                                <label for="angkatan" class="m-t-20">Angkatan</label>
                                <input type="text" class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan" id="angkatan" name="angkatan" value="{{ old('angkatan') }}">
                                @error('angkatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_keterangan" class="col-md-4 mt-1">
                                <label for="angkatan" class="m-t-20">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" rows="3"></textarea>
                                @error('keterangan')
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
<script>
    document.getElementById('tipe_jadwal').addEventListener('change', function () {
        var style = this.value == 1 ? '' : 'none';
        var styleClass = this.value == 1 ? 'col-md-4 mt-1' : 'col-md-6 mt-1';

        document.getElementById('form_kegiatan').style.display = style;
        document.getElementById('form_mulai').style.display = style;
        document.getElementById('form_selesai').style.display = style;
        document.getElementById('form_jamPelajaran').style.display = style;
        document.getElementById('form_angkatan').style.display = style;
        document.getElementById('form_keterangan').classList = styleClass;
        
    });

</script>
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