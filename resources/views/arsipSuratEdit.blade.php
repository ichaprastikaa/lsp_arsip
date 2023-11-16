@extends('layout.master')
@section('content')
@include('sweetalert::alert')
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
                            <h4 style="margin-top:10px">Edit Surat</h4>
                            <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="page-header float-right" style="background-color: #d4edda;">
                        <div class="page-title" >
                            <ol class="breadcrumb text-right " style="margin-top:3px; background-color: #d4edda;">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Table</a></li>
                                <li><a href="#">Arip Surat</a></li>
                                <li class="active">Unggah</li>
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
                            <li style="margin-top:0px; margin-bottom:10px; font-size:14px;">Gunakan file berformat PDF</li></p>
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
                        <a href="{{ route('arsip-surat') }}">
                            <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> | Kembali</button>
                        </a>
                    </div>
                    <div class="align-text-center">
                        <h4 align="center">Form Edit Surat</h4>
                    </div><br>
                    <div class="row"> 
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="justify-content-center">
                            <form action="{{route('update-arsip', $surat->kdSurat)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nomorSurat" class=" form-control-label">Nomor Surat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="nomorSurat" name="nomorSurat" placeholder="Masukkan Nomor Surat" class="form-control" value="{{$surat->nomorSurat}}" disabled readonly>
                                        <input type="hidden" id="nomorSurat" name="nomorSurat" placeholder="Masukkan Nomor Surat" class="form-control" value="{{$surat->nomorSurat}}" >
                                        <small id="nomorSuratValidation" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="kategoriSurat" class=" form-control-label">Kategori</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kategoriSurat" id="kategoriSurat" class="form-control">
                                            <option value="0" selected disabled>Please select</option>
                                            @foreach($kategoriList as $kategori)
                                                <option value="{{ $kategori->kdKategori }}" 
                                                    @if($kategori->kdKategori === $surat->kategoriSurat) 
                                                        selected 
                                                    @endif
                                                    >
                                                    {{ $kategori->namaKategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="judulSurat" class=" form-control-label">Judul</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="judulSurat" name="judulSurat" placeholder="Masukkan Judul" class="form-control" required value="{{$surat->judulSurat}}">
                                        <small id="judulSuratValidation" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="fileSurat" class="form-control-label">File Surat (PDF)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="fileSurat" name="fileSurat" class="form-control-file" accept="application/pdf">
                                        @if ($surat->file_surat != '-')
                                            <p class="mt-2">File yang diunggah: {{ $surat->fileSurat }}</p>
                                        @else 
                                            <p class="mt-2">Tidak ada File yang diunggah</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-right align-items-right">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">  
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Update</button>
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
    const nmrSurat = document.getElementById('nomorSurat');
    const nmrSuratValidationMessage = document.getElementById('nomorSuratValidation');

    nmrSurat.addEventListener('input', function() {

        if (nmrSurat.value.length > 20) {
            nmrSuratValidationMessage.textContent = 'Panjang Maksimal 20 Huruf';
            nmrSurat.setCustomValidity('Panjang Maksimal 20 Huruf');
        } else {
            nmrSuratValidationMessage.textContent = '';
            nmrSurat.setCustomValidity('');
        }
    });
</script>

<script>
    // Add an event listener to the judulSurat input field to validate its length and content
    const jdlSurat = document.getElementById('judulSurat');
    const jdlSuratValidationMessage = document.getElementById('judulSuratValidation');

    jdlSurat.addEventListener('input', function() {
        if (jdlSurat.value.length > 50) {
            jdlSuratValidationMessage.textContent = 'Panjang Maksimal 50 Huruf';
            jdlSurat.setCustomValidity('Panjang Maksimal 50 Huruf');
        } else {
            jdlSuratValidationMessage.textContent = '';
            jdlSurat.setCustomValidity('');
        }
    });
</script>
@endsection