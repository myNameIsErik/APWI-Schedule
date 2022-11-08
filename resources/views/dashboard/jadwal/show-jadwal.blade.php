@extends('layouts.master')
@section('content')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="sweetalert2.min.css"> --}}

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Jadwal
            </div>
            <div class="card-body">
                <div class="float-right">
                    <ul class="list-inline mb-3">
                        <li class="list-inline-item">
                            <a href="editJadwal-{{ $jdwl->id }}">
                            <button type="button" class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i> Edit Data</button>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <form action="data-jadwal.{{ $jdwl->id }}" method="POST" id="deleteForm" onclick="return confirm('Apakah anda yakin ingin menghapus kegiatan ini');">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <table class="table table-profile">
                    <tbody>
                    <tr>
                        <th scope="row">Kegiatan:</th>
                        @if($jdwl->tipe_jadwal != 1)
                        <td>Perjalanan Dinas</td>
                        @else
                        <td>{{ isset($jdwl->kegiatan)?$jdwl->kegiatan->nama_kegiatan: '-' }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th scope="row">Pegawai:</th>
                        <td>{{ $jdwl->user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal:</th>
                        <td>{{ date('d-m-Y', strtotime($jdwl->waktu_mulai)); }}</td>
                    </tr>
                    <tr style="display:{{ $jdwl->tipe_jadwal == '2' ? 'none' : '' }}">
                        <th scope="row">Waktu:</th>
                        <td>{{ date('H:i', strtotime($jdwl->waktu_mulai)) }} - {{ date('H:i', strtotime($jdwl->waktu_selesai)) }}</td>
                    </tr>
                    <tr style="display:{{ $jdwl->tipe_jadwal == '2' ? 'none' : '' }}">
                        <th scope="row">Jam Pelajaran:</th>
                        <td>{{ $jdwl->jp }}</td>
                    </tr>
                    <tr style="display:{{ $jdwl->tipe_jadwal == '2' ? 'none' : '' }}">
                        <th scope="row">Angkatan:</th>
                        <td>{{ $jdwl->angkatan }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Keterangan:</th>
                        <td>{{ isset($jdwl->keterangan)?$jdwl->keterangan: '-' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script> --}}

{{-- <script type="text/javascript">
    try {
        const btnDelete = document.querySelectorAll('#deleteForm');
        btnDelete.forEach((button, index) => {
            button.addEventListener('submit', function(e) {
                var form = this;
                e.preventDefault(); // <--- prevent form from submitting
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this hotel!",
                    icon: "warning",
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title: 'Success!',
                            text: 'Hotel are successfully deleted!',
                            icon: 'success'
                        }).then(function() {
                            form.submit();
                        });
                    } else {
                        swal("Cancelled", "Hotel is safe :)", "error");
                    }
                })
            });
        });
    } catch (error) {
    }
</script> --}}
@endsection