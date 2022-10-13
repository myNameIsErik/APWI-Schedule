@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center mb-4">
                    <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                    <div class="media-body">
                        <h3 class="mb-0">{{ $user->name }}</h3>
                        <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                </div>
                
                <div class="row mb-5">
                    <div class="col-12">
                        <button class="btn btn-success px-5" disabled>{{ $user->status->status_name }}</button>
                    </div>
                </div>

                <h4>{{ $user->nip }}</h4>
                <ul class="card-profile__info">
                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>{{ $user->phone }}</span></li>
                    <li><strong class="text-dark mr-4">Level</strong> <span>{{ $user->level }}</span></li>
                </ul>

                <a href="{{ $user->id }}.editP"><button type="button" class="btn btn-sm mb-1 btn-warning">Edit</button></a>
                <form action="data-pegawai.{{ $user->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm mb-1 btn-danger">Hapus</button>
                </form>
            </div>
        </div>  
    </div>
</div>
@endsection