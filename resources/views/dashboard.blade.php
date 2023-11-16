@extends('layout.master')
@section('content')
@include('sweetalert::alert')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner" style="background-color: #d4edda ;">
        <div class="row m-0" style="background-color: #d4edda ;">
            <div class="col-sm-6">
                <div class="page-header float-left" style="background-color: #d4edda ;">
                    <div class="page-title" style="background-color: #d4edda ;">
                        <h4 style="margin-top:10px">Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="background-color: #d4edda;">
                    <div class="page-title" >
                        <ol class="breadcrumb text-right " style="margin-top:3px; background-color: #d4edda;">
                            <li class="active">Dashboard</li>
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$surat}}</span></div>
                                    <div class="stat-heading">Data Surat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$kategoriAktif}}</span></div>
                                    <div class="stat-heading">Data Kategori</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                            </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">Single Bar Chart </h4>
                    <canvas id="singelBarChart" height="304" style="display: block; height: 203px; width: 407px;" width="610" class="chartjs-render-monitor"></canvas>
                </div>
            </div>           
        </div> -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script src="assets/js/init/chartjs-init.js"></script>
@endsection
