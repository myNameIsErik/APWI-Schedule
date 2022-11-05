@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="/add-golongan" method="post">
                        @csrf
                        <div class="row form-material">
                            <div id="form_pangkat" class="col-md-4 mt-2">
                                <label for="pangkat" class="m-t-20">Pangkat </label> <span class="text-danger">*</span>
                                <input type="text" class="form-control @error('nama_pangkat') is-invalid @enderror" placeholder="Masukkan Pangkat..." id="pangkat" name="nama_pangkat" value="{{ old('pangkat') }}">
                                @error('nama_pangkat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div id="form_golongan" class="col-md-4 mt-2">
                                <label class="m-t-20" for="jenis_golongan">Golongan <span class="text-danger">*</span></label>
                                <select class="form-control" id="jenis_golongan" name="jenis_golongan">
                                    @if(old('jenis_golongan'))
                                        <option value="{{ old('jenis_golongan') }}" selected>{{ old('jenis_golongan') }}</option>
                                    @else
                                    <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    @endif
                                </select>
                            </div>
                            <div id="form_ruang" class="col-md-4 mt-2">
                                <label class="m-t-20" for="ruang">Ruang <span class="text-danger">*</span></label>
                                <select class="form-control" id="ruang" name="ruang" value="{{ old('ruang') }}">
                                    @if(old('jenis_golongan'))
                                        <option value="{{ old('ruang') }}">{{ old('ruang') }}</option>
                                    @else
                                        <option value="A" selected>A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    @endif
                                </select>
                            </div>
                            <div id="form_submit" class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection