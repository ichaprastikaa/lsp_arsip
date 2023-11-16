@extends('layout.master')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner" style="background-color: #d4edda ;">
        <div class="row m-0" style="background-color: #d4edda ;">
            <div class="col-sm-6">
                <div class="page-header float-left" style="background-color: #d4edda ;">
                    <div class="page-title" style="background-color: #d4edda ;">
                        <h4 style="margin-top:10px">About Developer</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="background-color: #d4edda;">
                    <div class="page-title" >
                        <ol class="breadcrumb text-right " style="margin-top:3px; background-color: #d4edda;">
                            <li><a href="#">About</a></li>
                            <li class="active">About Developer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="col-md-12 col-lg-12">
        {{-- <div class="row"> --}}
        <div class="col-md-12">
            <div class="card" data-aos="fade-up" data-aos-delay="800">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{asset('assets/images/pictIcha.jpg')}}" alt="" style="width: 165px; height: auto;border-radius : 10px">
                        </div>
                        <div class="col-md-7 ms-3">
                            <h5>Aplikasi ini dibuat oleh :</h5>
                            <table class="text-dark mt-3">
                                <tr>
                                    <td class="fw-bold">Nama</td>
                                    <td>:</td>
                                    <td>Icha Prastika Ayuningtyas</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Program Studi</td>
                                    <td>:</td>
                                    <td>D3-Manajemen Informatika PSDKU Kediri</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">NIM</td>
                                    <td>:</td>
                                    <td>2131730066</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tanggal Pembuatan</td>
                                    <td>:</td>
                                    <td>08 November 2023</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection