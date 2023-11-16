<?php

namespace App\Http\Controllers;

use App\Models\arsipSuratModel;
use App\Models\kategoriSuratModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        $surat = arsipSuratModel::count();
        $kategoriAktif = kategoriSuratModel::count();
        return view("/dashboard", compact("surat", "kategoriAktif"));
    }
}
