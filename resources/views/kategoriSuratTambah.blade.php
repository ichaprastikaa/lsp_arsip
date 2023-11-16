@extends('layout.master')
@section('content')
@include('sweetalert::alert')

<div class="sweetalert-container">
    @include('sweetalert::alert')
</div>
@php
$today = date('Y-m-d');
@endphp
@if ($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid" style="margin-top:20px;">
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner" style="background-color: #d4edda ;">
            <div class="row m-0" style="background-color: #d4edda ;">
                <div class="col-sm-6">
                    <div class="page-header float-left" style="background-color: #d4edda ;">
                        <div class="page-title" style="background-color: #d4edda ;">
                            <h4 style="margin-top:10px">Tambah Kategori Surat</h4>
                            <p>Tambahkan atau edit data kategori. <br>Jika sudah selesai, jangan lupa untuk klik tombol "Simpan".</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="page-header float-right" style="background-color: #d4edda;">
                        <div class="page-title" >
                            <ol class="breadcrumb text-right " style="margin-top:3px; background-color: #d4edda;">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Table</a></li>
                                <li><a href="#">Kategori Surat</a></li>
                                <li class="active">Tambah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-sm-12">
                    <div>
                        <hr style="margin-top:1px">
                        <p style="margin-top:0px; margin-bottom:10px; font-size:14px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <!-- <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Arsip Surat >> Unggah</h4>
            <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan</p>
            <hr>
            <p class="mb-0">Catatan</p>
            <li>Gunakan file berformat PDF</li>
        </div> -->
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-body card-block">
                    <div class="">
                        <a href="{{ route('kategori-surat') }}">
                            <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> | Kembali</button>
                        </a>
                    </div>
                    <div class="align-text-center">
                        <h4 align="center">Form Tambah Kategori Surat</h4>
                    </div><br>
                    <div class="row"> 
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="justify-content-center">
                            <form action="{{route('tambah-kategori')}}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-12 col-md-3">
                                        <label for="kdKategori" class=" form-control-label">Nomor Kategori</label>
                                        <input type="text" id="kdKategori"value="{{$nomorKategori}}" placeholder="{{$nomorKategori}}" class="form-control" disabled>
                                        <input type="hidden" id="kdKategori" name="kdKategori" value="{{$nomorKategori}}" placeholder="{{$nomorKategori}}" class="form-control">
                                    </div>
                                    <div class="col col-md-9">
                                        <label for="namaKategori" class=" form-control-label">Nama Kategori</label>
                                        <input type="text" id="namaKategori" name="namaKategori" placeholder="Masukkan Nama Kategori" class="form-control" required>
                                        <small id="namaKategoriValidation" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="keterangan" class=" form-control-label">Keterangan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea type="text" style="height:150px" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-right align-items-right">
                                    <div class="col-md-11"></div>
                                    <div class="col-md-1">  
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add an event listener to the namaKategori input field to validate its length and content
    const nmKategori = document.getElementById('namaKategori');
    const namaKategoriValidationMessage = document.getElementById('namaKategoriValidation');

    nmKategori.addEventListener('input', function() {
        const nmKategoriValue = nmKategori.value.trim(); // Remove leading and trailing spaces
        const alphabeticValue = nmKategoriValue.replace(/[^a-zA-Z\s]/g, ''); // Remove non-alphabetic characters

        // Update the input value with the filtered alphabetic value
        nmKategori.value = alphabeticValue;

        if (alphabeticValue.length > 20) {
            namaKategoriValidationMessage.textContent = 'Panjang Maksimal 20 Huruf';
            nmKategori.setCustomValidity('Panjang Maksimal 20 Huruf');
        } else {
            namaKategoriValidationMessage.textContent = '';
            nmKategori.setCustomValidity('');
        }
    });
</script>


@endsection