@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="/add-pegawai" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="name">Nama <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Nama Pengajar.." value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nip">NIP <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="np" name="nip" placeholder="Masukan NIP Pengajar.." value="{{ old('nip') }}">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="username">Username <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan Nama Pengajar.." value="{{ old('username') }}">
                                @error('username')
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
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email Pengajar.." value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="password">Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan Password.." value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="status_id">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="status_id" name="status_id">
                                    @foreach($status as $stat)
                                        @if(old('status_id') == $stat->id)
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
                                    <option value="Admin">
                                        Admin
                                    </option>
                                    <option value="User">
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
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Masukan No HP Pengajar.." value="{{ old('phone') }}">
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