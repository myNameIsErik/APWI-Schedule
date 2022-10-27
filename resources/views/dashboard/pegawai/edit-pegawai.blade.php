@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="data-pegawai.{{ $pegawai->id }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nip">NIP <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukan NIP Pengajar.." value="{{ old('nip', $pegawai->nip) }}">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="name">Nama <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Nama Pengajar.." value="{{ old('name', $pegawai->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email Pengajar.." value="{{ old('email', $pegawai->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jabatan">Jabatan <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="Masukan Jabatan.." value="{{ old('jabatan', $pegawai->jabatan) }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="golongan">Gol. Ruang <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control @error('golongan') is-invalid @enderror" id="golongan" name="golongan">
                                    <option value="{{ old('golongan', $pegawai->golongan) }}" selected>{{ $pegawai->golongan }}</option>
                                    <option value="I/a">I/a</option>
                                    <option value="I/b">I/b</option>
                                    <option value="I/c">I/c</option>
                                    <option value="I/d">I/d</option>
                                    <option value="II/a">II/a</option>
                                    <option value="II/b">II/b</option>
                                    <option value="II/c">II/c</option>
                                    <option value="II/d">II/d</option>
                                    <option value="III/a">III/a</option>
                                    <option value="III/b">III/b</option>
                                    <option value="III/c">III/c</option>
                                    <option value="III/d">III/d</option>
                                    <option value="IV/a">IV/a</option>
                                    <option value="IV/b">IV/b</option>
                                    <option value="IV/c">IV/c</option>
                                    <option value="IV/d">IV/d</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="status_id">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="status_id" name="status_id">
                                    @foreach($status as $stat)
                                        @if(old('status_id', $pegawai->status_id) == $stat->id)
                                            <option value="{{ $stat->id }}" selected>{{ $stat->status_name }}</option>
                                        @else
                                            <option value="{{ $stat->id }}">{{ $stat->status_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="level">Level <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="level" name="level">
                                    <option value="Admin" {{ old('level', $pegawai->level) == 'Admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>
                                    <option value="User" {{ old('level', $pegawai->level) == 'User' ? 'selected' : '' }}>
                                        User
                                    </option>
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="phone">No HP <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Masukan No HP Pengajar.." value="{{ old('phone', $pegawai->phone) }}">
                                @error('phone')
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