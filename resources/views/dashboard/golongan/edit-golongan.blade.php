@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="data-golongan.{{ $golongan->id }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jenis_golongan">Golongan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('jenis_golongan') is-invalid @enderror" id="jenis_golongan" name="jenis_golongan" placeholder="Masukan Golongan.." value="{{ old('jenis_golongan', $golongan->jenis_golongan) }}">
                                @error('jenis_golongan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection