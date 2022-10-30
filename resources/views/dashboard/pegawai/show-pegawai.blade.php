@extends('layouts.master')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<div class="row">
    <div class="col-12">
        {{-- <h4 class="card-title"></h4> --}}
            <div class="card">
                <div class="card-header">
                    Data Pegawai {{ $user->name }}
                </div>
                <div class="card-body">
                    <div class="float-right">
                        <ul class="list-inline mb-3">
                            <li class="list-inline-item">
                                <a href="editPegawai-{{ $user->nip }}">
                                <button type="button" class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i> Edit Data</button>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <form action="data-pegawai.{{ $user->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-dash-circle"></i> Hapus</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <table class="table table-profile">
                        <tbody>
                        <tr>
                            <th scope="row">NIP:</th>
                            <td>{{ $user->nip }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jabatan:</th>
                            <td>{{ $user->jabatan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Golongan:</th>
                            <td>{{ $user->golongan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">E-mail:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>
                                @if($user->status->status_name == 'Tersedia')
                                    <button type="button" class="btn btn-success btn-sm text-white" style="pointer-events: none;">Tersedia</button>
                                @elseif($user->status->status_name == 'Perjalanan Dinas')
                                    <button type="button" class="btn btn-danger btn-sm text-white" style="pointer-events: none;">Perjalanan Dinas</button>
                                @elseif($user->status->status_name == 'Maks JP')
                                    <button type="button" class="btn btn-danger btn-sm text-white" style="pointer-events: none;">Maks JP</button>
                                @else
                                    {{ $user->status->status_name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Roles:</th>
                            <td>
                                <button type="button" class="btn btn-info btn-sm text-white" style="pointer-events: none;">{{ $user->level }}</button>    
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Jadwal:</th>
                            <td>
                                <a href="jadwal-{{ $user->nip }}"><button type="button" class="btn btn-primary btn-sm text-white"><i class="bi bi-calendar2-check"></i> Lihat Semua Jadwal</button></a> 
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@endsection