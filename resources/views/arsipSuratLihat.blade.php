@extends('layout.master')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner" style="background-color: #d4edda ;">
            <div class="row m-0" style="background-color: #d4edda ;">
                <div class="col-sm-6">
                    <div class="page-header float-left" style="background-color: #d4edda ;">
                        <div class="page-title" style="background-color: #d4edda ;">
                            <h4 style="margin-top:10px">Lihat Surat</h4>
                            <p>Berikut ini adalah halaman lihat surat yang telah diarsipkan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="page-header float-right" style="background-color: #d4edda;">
                        <div class="page-title" >
                            <ol class="breadcrumb text-right " style="margin-top:3px; background-color: #d4edda;">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Surat</a></li>
                                <li class="active">Lihat Surat</li>
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
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card" data-aos="fade-up" data-aos-delay="800">
                    <div class="flex-wrap card-header">
                        <div class="header-title d-flex justify-content-between">
                            <h4 class="card-title fw-bold">{{ $surat['judulSurat'] }}</h4>
                        </div>
                        <span class="badge bg-primary text-white">{{ $surat->kategoriList->namaKategori }}</span>
                        <table class="text-dark">
                            <tr>
                                <td>Nomor Surat</td>
                                <td>:</td>
                                <td>{{ $surat['nomorSurat'] }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Unggah</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($surat['waktuPengarsipan'])->format('d F Y H:i:s') }}</td>
                            </tr>
                            @if ($surat['updated_at'] != null)
                                <tr>
                                    <td>Diperbarui</td>
                                    <td>:</td>
                                    <td>{{ $surat['updated_at']->format('d F Y H:i:s') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <div class="card-body">
                        @if ($surat['fileSurat'] && $surat['fileSurat'] != '-')
                            <iframe src="/FileArsip/{{ $surat['fileSurat'] }}" frameborder="0" width="100%" height="650px"></iframe>
                            <button type="submit" class="btn btn-sm btn-primary mt-3" onclick="goBack()"><i class="fa fa-arrow-left"></i> | Kembali</button>
                            <a href="{{route('edit-arsip', $surat->kdSurat)}}" class="btn btn-sm btn-warning mt-3"><i class="fa fa-edit"></i> Edit Surat</a>
                            <!-- <button type="submit" class="btn btn-sm btn-warning mt-3" data-id="{{ $surat->kdSurat }}"><i class="fa fa-edit"></i> Edit Surat</button> -->
                            <a href="#" class="btn btn-sm btn-success mt-3 downloadButton" data-id="{{ $surat->kdSurat }}">
                                <i class="fa fa-download"></i>Unduh
                            </a>
                        @else
                            <p>Tidak ada dokumen untuk surat ini.</p>
                            <button type="submit" class="btn btn-sm btn-primary mt-3" onclick="goBack()"><i class="fas fa-arrow-left"></i> | Kembali</button>
                            <button type="submit" class="btn btn-sm btn-warning mt-3" data-id="{{ $surat->kd_surat }}"><i class="fas fa-edit"></i> | Edit Surat</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function goBack() {
            window.location.href = '/arsipSurat';
        }
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