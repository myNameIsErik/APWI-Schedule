@extends('...layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="#" method="post">
                        <div class="row form-material">
                            <div class="col-md-12">
                                <label class="m-t-20">Kode Jadwal</label>
                                <input type="text" class="form-control" placeholder="2017-06-04" id="mdate">
                            </div>
                            <div class="col-md-12">
                                <label class="m-t-20">Tanggal</label>
                                <input type="date" class="form-control" placeholder="2017-06-04" id="mdate">
                            </div>
                            <div class="col-md-6">
                                <label class="m-t-20">Jam Mulai</label>
                                <input type="time" class="form-control" id="timepicker" placeholder="Check time">
                            </div>
                            <div class="col-md-6">
                                <label class="m-t-20">Jam Selesai</label>
                                <input type="time" class="form-control" id="timepicker" placeholder="Check time">
                            </div>
                            <div class="col-md-6">
                                <label>Mata Pelajaran</label>
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Kelas</label>
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Pengajar</label>
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="m-t-20">Jumlah Jam Pelajaran</label>
                                <input type="text" class="form-control" placeholder="2017-06-04" id="mdate">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection