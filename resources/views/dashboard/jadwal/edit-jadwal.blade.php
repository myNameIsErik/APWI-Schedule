@extends('...layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <h4 class="card-title">Data Jadwal {{ $jadwal->user->name }}</h4>
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="data-jadwal.{{ $jadwal->id }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="row form-material">
                            <div class="col-md-6 mt-4">
                                <label for="tipe_kegiatan">Tipe Jadwal</label> <span class="text-danger">*</span>
                                <select class="form-control" id="tipe_jadwal" name="tipe_jadwal">
                                    <option value="1" {{ old('tipe_jadwal', $jadwal->tipe_jadwal) == '1' ? 'selected' : '' }}>
                                        Mengajar
                                    </option>
                                    <option value="2" {{ old('tipe_jadwal', $jadwal->tipe_jadwal) == '2' ? 'selected' : '' }}>
                                        Perjalanan Dinas
                                    </option>
                                    {{-- @if(old('tipe_jadwal', $jadwal->tipe_jadwal) == '1')
                                        <option value="{{ old('tipe_jadwal', $jadwal->tipe_jadwal) }}" selected>Mengajar</option>
                                        <option value="2">Perjalanan Dinas</option>
                                    @else
                                        <option value="{{ old('tipe_jadwal', $jadwal->tipe_jadwal) }}" selected>Perjalan Dinas</option>
                                        <option value="1">Mengajar</option>
                                    @endif --}}
                                </select>
                            </div>
                            <div id="form_kegiatan" class="col-md-6 mt-4">
                                <label for="kegiatan">Kegiatan</label> <span class="text-danger">*</span>
                                <select class="form-control" id="kegiatan" name="kegiatan_id">
                                    @foreach($kegiatan as $keg)
                                        @if(old('kegiatan_id', $jadwal->kegiatan_id) == $keg->id)
                                            <option value="{{ $keg->id }}" selected>{{ $keg->nama_kegiatan }}</option>
                                        @else
                                            <option value="{{ $keg->id }}">{{ $keg->nama_kegiatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-6 mt-4">
                                <label for="pengajar">Pengajar</label>
                                <select class="form-control" id="pengajar" name="user_id" @if(Auth::user()->level == 'User')disabled @endif>
                                    @foreach($pegawai as $pgw)
                                        @if(old('kegiatan_id', $jadwal->user_id) == $keg->id)
                                            <option value="{{ $pgw->id }}" selected>{{ $pgw->name }}</option>
                                        @else
                                            <option value="{{ $pgw->id }}">{{ $pgw->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="col-md-6 mt-4">
                                <label for="pengajar">Tanggal</label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Tanggal Kegiatan" value="{{ old('waktu_mulai', date('Y-m-d', strtotime($jadwal->waktu_mulai))) }}">
                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div id="form_mulai" class="col-md-4 mt-4">
                                <label for="mulai" class="m-t-20">Jam Mulai</label> <span class="text-danger">*</span>
                                <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="mulai" name="waktu_mulai" placeholder="Check time" value="{{ old('waktu_mulai', date('H:i', strtotime($jadwal->waktu_mulai))) }}">
                                @error('waktu_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_selesai" class="col-md-4 mt-4">
                                <label for="selesai" class="m-t-20">Jam Selesai</label> <span class="text-danger">*</span>
                                <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="selesai" name="waktu_selesai" placeholder="Check time" value="{{ old('waktu_selesai', date('H:i', strtotime($jadwal->waktu_selesai))) }}">
                                @error('waktu_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <button id="btn_checkJadwalUpdate" type="button" class="btn btn-info my-2">Check</button><span id="checkSpan" class="ml-2 text-danger" style="display: none;"></span>
                            </div>
                            <div id="form_pengajar" class="col-md-6 mt-2">
                                <label for="pengajar">Pegawai</label> <span class="text-danger">*</span>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Pegawai" name="user_id" list="list-pengajar" id="pengajar" autocomplete="off" value="{{ old('pengajar', $jadwal->user->name) }}">
                                    <datalist id="list-pengajar">
                                    </datalist>
                                </div>
                            </div>
                            <div id="form_jamPelajaran"class="col-md-3 mt-2">
                                <label for="jp" class="m-t-20">Jumlah Jam Pelajaran</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control @error('jp') is-invalid @enderror" placeholder="" id="jp" name="jp" value="{{ old('jp', $jadwal->jp) }}" readonly="true">
                                @error('jp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_angkatan" class="col-md-3 mt-2">
                                <label for="angkatan" class="m-t-20">Angkatan</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control @error('angkatan') is-invalid @enderror" placeholder="Angkatan" id="angkatan" name="angkatan" value="{{ old('angkatan', $jadwal->angkatan) }}">
                                @error('angkatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_keterangan" class="col-md-6 mt-4">
                                <label for="angkatan" class="m-t-20">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" on placeholder="Keterangan" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $jadwal->keterangan) }}</textarea>
                                @error('keterangan')
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
<script>
    $('#btn_checkJadwalUpdate').on('click', () => {
            var check_tipe = document.getElementById("tipe_jadwal").value
            var tipe_jadwal = document.getElementById("tanggal").value;
            var tipe_jadwal2 = document.getElementById("mulai").value;
            var tipe_jadwal3 = document.getElementById("selesai").value;
            
            if(check_tipe == 1){
                if (!tipe_jadwal || !tipe_jadwal2 || !tipe_jadwal3) {
                    var checkSpan = document.getElementById('checkSpan');
                    checkSpan.style.display = '';
                    checkSpan.innerHTML = "Lengkapi Inputan!"
                    setTimeout(() => {
                        checkSpan.style.display = 'none';
                    }, 3000);
                } else {
                    //Get startTime
                    var startTime = tipe_jadwal2;
                    var arrStart = startTime.split(':');
                    var endStartHrs = $.trim(arrStart[0]);
                    var endStartMnt = $.trim(arrStart[1]);
                    
                    //Get endTime
                    var endTime = tipe_jadwal3;
                    var arrEnd = endTime.split(':');
                    var endHoursHrs = $.trim(arrEnd[0]);
                    var endHoursMnt = $.trim(arrEnd[1]);

                    //Get results
                    var getHours = endHoursHrs - endStartHrs;
                    var getMnts = endHoursMnt - endStartMnt;
                    var y = (getHours*60) + getMnts;
                    var z = y / 45;
                    var str = z.toString();
                    var arrFix = str.split('.');
                    var results = $.trim(arrFix[0])

                    var jp = document.getElementById('jp');
                    jp.value  = results;

                    
                    var checkSpan = document.getElementById('checkSpan');
                    checkSpan.style.display = '';
                    checkSpan.innerHTML = "Check Pegawai Berhasil!"
                    setTimeout(() => {
                        checkSpan.style.display = 'none';
                    }, 3000);

                    $.ajax({
                        type: 'GET',
                        url: '{{ url('/get-pegawaiUpdate') }}',
                        data: {
                            tanggal: tipe_jadwal,
                            mulai: tipe_jadwal2,
                            selesai: tipe_jadwal3,
                            jp: results,
                            id: '{{ $jadwal->id }}',
                        },
                        dataType: "json",
                        success: function ({data, debug}) {
                            console.log(debug, data);
                            $('#list-pengajar').html(data.map(({ id, name }) => (`<option value="${name}"></option>`)).join(''));
                        },
                        error: function (xhr) {
                            alert('Error')
                        }
                    });
                }
            } else {
                if(!tipe_jadwal){
                    var checkSpan = document.getElementById('checkSpan');
                    checkSpan.style.display = '';
                    checkSpan.innerHTML = "Lengkapi Inputan!"
                    setTimeout(() => {
                        checkSpan.style.display = 'none';
                    }, 3000);
                } else {
                    var checkSpan = document.getElementById('checkSpan');
                    checkSpan.style.display = '';
                    checkSpan.innerHTML = "Check Pegawai Berhasil!"
                    setTimeout(() => {
                        checkSpan.style.display = 'none';
                    }, 3000);

                    $.ajax({
                        type: 'GET',
                        url: '{{ url('/get-pegawaiUpdate') }}',
                        data: {
                            tanggal: tipe_jadwal,
                            mulai: '00:00:00',
                            selesai: '23:59:59',
                            jp: 15,
                        },
                        dataType: "json",
                        success: function ({data, debug}) {
                            console.log(debug, data);
                            $('#list-pengajar').html(data.map(({ id, name }) => (`<option value="${name}"></option>`)).join(''));
                        },
                        error: function (xhr) {
                            alert('Error')
                        }
                    });
                }
            }
        });

    // Change Tipe Jadwal
    document.getElementById('tipe_jadwal').addEventListener('change', function () {

    var style = this.value == 1 ? '' : 'none';
    var styleClass = this.value == 1 ? 'col-md-4 mt-1' : 'col-md-6 mt-1';

    var btnSubmit = document.getElementById('btnSubmit');
    btnSubmit = this.value == 1 ? btnSubmit.classList.remove('pull-right') : btnSubmit.classList.add('pull-right');

    document.getElementById('form_kegiatan').style.display = style;
    document.getElementById('form_mulai').style.display = style;
    document.getElementById('form_selesai').style.display = style;
    document.getElementById('form_jamPelajaran').style.display = style;
    document.getElementById('form_angkatan').style.display = style;
    document.getElementById('form_keterangan').classList = styleClass;
    document.getElementById('form_date').classList = styleClass;
    });
</script>
{{-- <script>
    function changeType() {
        document.getElementById('tipe_jadwal').addEventListener('change', function () {

        var style = this.value == 1 ? '' : 'none';
        var styleClass = this.value == 1 ? 'col-md-4 mt-1' : 'col-md-6 mt-1';

        var btnSubmit = document.getElementById('btnSubmit');
        btnSubmit = this.value == 1 ? btnSubmit.classList.remove('pull-right') : btnSubmit.classList.add('pull-right');

        document.getElementById('form_kegiatan').style.display = style;
        document.getElementById('form_mulai').style.display = style;
        document.getElementById('form_selesai').style.display = style;
        document.getElementById('form_jamPelajaran').style.display = style;
        document.getElementById('form_angkatan').style.display = style;
        document.getElementById('form_keterangan').classList = styleClass;
        document.getElementById('form_date').classList = styleClass;
        });
    }
</script> --}}
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