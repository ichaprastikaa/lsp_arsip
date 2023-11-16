@extends('layout.master')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner" style="background-color: #d4edda ;">
        <div class="row m-0" style="background-color: #d4edda ;">
            <div class="col-sm-6">
                <div class="page-header float-left" style="background-color: #d4edda ;">
                    <div class="page-title" style="background-color: #d4edda ;">
                        <h4 style="margin-top:10px">Arsip Surat</h4>
                        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="background-color: #d4edda;">
                    <div class="page-title" >
                        <ol class="breadcrumb text-right " style="margin-top:3px; background-color: #d4edda;">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Surat</a></li>
                            <li class="active">Arsip Surat</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-sm-12">
                <div>
                    <hr style="margin-top:1px">
                    <p style="margin-bottom:0px; font-size:14px;">Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
                    <p style="margin-bottom:10px; font-size:14px;">Klik "Arsipkan Surat" untuk menambahkan surat yang diarsipkan   </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <!-- <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Arsip Surat</h4>
        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
        <hr>
        <p class="mb-0">Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
        <p class="mb-0">Klik "Arsipkan Surat" untuk menambahkan surat yang diarsipkan   </p>
    </div> -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong class="card-title">Arsip Surat</strong>
                        <a href="{{ route('form-arsipTambah') }}"><button type="button" class="btn btn-primary m-1" id="tambahArsipButton">
                        <i class="fa fa-archive"></i> Arsipkan Surat</button></a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Waktu Pengerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($dataArsip as $data)
                                <tr>
                                    <td>{{ $data->nomorSurat}}</td>
                                    <td>{{ $data->kategoriList->namaKategori }}</td>
                                    <td>{{ $data->judulSurat}}</td>
                                    <td>{{ $data->waktuPengarsipan}}</td>
                                    <td>
                                        <div class="button-container d-flex justify-content-center align-items-center">
                                            <a href="#" class="btn btn-outline-warning btn-icon btn-sm downloadButton" data-id="{{ $data->kdSurat }}">
                                                <i class="fa fa-download"></i>Unduh
                                            </a>
                                            <form action="{{ route('hapus-arsip', $data->kdSurat) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm deleteButton" >
                                                    <i class="fa fa-trash"> Hapus</i>
                                                </button>
                                            </form>
                                            <a href="{{route ('lihat-arsip', $data->kdSurat)}}">
                                                <button type="button" class="btn btn-outline-primary btn-icon btn-sm">
                                                <i class="fa fa-eye"></i>Lihat</button>
                                            </a>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const downloadButtons = document.querySelectorAll('.downloadButton');
        downloadButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const itemId = this.getAttribute('data-id');
                // Ganti URL sesuai dengan URL yang sesuai untuk mengunduh file_surat
                const downloadUrl = '/unduhArsipSurat/' + itemId;
                // Buka URL dalam tab baru atau jendela
                window.location.href = downloadUrl;
            });
        });
    });
</script>
@endsection