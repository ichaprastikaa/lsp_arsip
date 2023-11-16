@extends('layout.master')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner" style="background-color: #d4edda ;">
        <div class="row m-0" style="background-color: #d4edda ;">
            <div class="col-sm-6">
                <div class="page-header float-left" style="background-color: #d4edda ;">
                    <div class="page-title" style="background-color: #d4edda ;">
                        <h4 style="margin-top:10px">Kategori Surat</h4>
                        <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="background-color: #d4edda;">
                    <div class="page-title" >
                        <ol class="breadcrumb text-right " style="margin-top:3px; background-color: #d4edda;">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Surat</a></li>
                            <li class="active">Kategori Surat</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-sm-12">
                <div>
                    <hr style="margin-top:1px">
                    <p style="margin-bottom:0px; font-size:14px;">Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru</p>
                    <p style="margin-bottom:10px; font-size:14px;">Klik "Edit" pada kolom aksi untuk memperbarui kategori </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content" style="padding-top:-100px">
    <!-- <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Kategori Surat</h4>
        <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
        <hr>
        <p class="mb-0 " style="font-size:12px; padding-top:-5px">Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru
        <p class="mb-0 " style="font-size:12px; padding-top:-5px">Klik "Edit" pada kolom aksi untuk memperbarui kategori    </p>
    </div> -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong class="card-title">Kategori Surat</strong>
                        <a href="{{ route('form-kategoriTambah') }}">
                            <button type="button" class="btn btn-primary m-1" >
                            <i class="fa fa-plus-square"></i> Tambah Kategori</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($dataKategori as $data)
                                <tr>
                                    <td>{{ $data->kdKategori}}</td>
                                    <td>{{ $data->namaKategori}}</td>
                                    <td>{{ $data->keterangan}}</td>
                                    <td>
                                        <div class="button-container d-flex justify-content-center align-items-center">
                                            <a href="{{ route('form-kategoriEdit', $data->kdKategori) }}">
                                                <button type="button" class="btn btn-outline-primary btn-icon btn-sm">
                                                <i class="fa fa-edit"></i>Edit</button>
                                            </a>
                                            <form action="{{ route('hapus-kategori', $data->kdKategori) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm deleteButton" >
                                                    <i class="fa fa-trash"> Hapus</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script alert delete -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.deleteButton');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const form = this.closest('form');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection