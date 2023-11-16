<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arsipSuratModel;
use App\Models\kategoriSuratModel;
use Illuminate\Support\Carbon;

class arsipSuratController extends Controller{
    public function tampilArsip(Request $request){
        // dd($request->all());
        $dataArsip = arsipSuratModel::all();

        return view('arsipSurat', ['dataArsip'=>$dataArsip]);
    }
    public function tampilFormTambahArsip(Request $request){
        // dd($request->all());
        $kategori = kategoriSuratModel::all();
        return view('arsipSuratTambah', ['kategori'=>$kategori]);
    }
    
    public function tambahArsip(Request $request){
        $request->validate([
            'nomorSurat' => 'required',
            'judulSurat' => 'required',
            'kategoriSurat' => 'required',
            'fileSurat' => 'required|mimes:pdf|max:2048',
        ], [
            'nomorSurat.required' => 'Nomor Surat harus diisi.',
            'judulSurat.required' => 'Judul Surat harus diisi.',
            'kategoriSurat.required' => 'Kategori Surat harus dipilih.',
            'fileSurat.required' => 'File Surat harus diupload.',
            'fileSurat.mimes' => 'File Surat harus berupa PDF.',
            'fileSurat.max' => 'File Surat maksimal 2 Mb.',
        ]);
        // dd($request->all());
        // Menyimpan file dengan nama yang unik dan di folder 'FileArsip'
        $file_surat = $request->file('fileSurat');
        $nama_surat = $file_surat->getClientOriginalName();
        $file_surat->move(public_path('FileArsip/'), $nama_surat);

        // dd($request->all());
        // Mendapatkan id terakhir
        $lastSurat = arsipSuratModel::orderBy('kdSurat', 'desc')->first();
        if ($lastSurat) {
            $lastKd = intval(substr($lastSurat->kdSurat, 1));
        } else {
            $lastKd = 0;
        }
        $kd = 'S' . str_pad($lastKd + 1, 3, '0', STR_PAD_LEFT);

        // Buat instansiasi objek Akun dengan data input
        $surat = new arsipSuratModel();
        $surat->kdSurat = $kd;
        $surat->nomorSurat = $request->nomorSurat;
        $surat->judulSurat = $request->judulSurat;
        $surat->kategoriSurat = $request->kategoriSurat;
        $surat->fileSurat = $nama_surat;
        $surat->waktuPengarsipan = Carbon::now();
        $surat->updated_at = null;


        // Simpan surat ke database
        $surat->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Surat berhasil diarsipkan.', 'success');

        return redirect('/arsipSurat');
    }

    public function lihatArsip($id){
        // dd($request->all());
        $surat = arsipSuratModel::with('kategoriList')->find($id);
        $kategoriList = kategoriSuratModel::all();
        return view('arsipSuratLihat', ['surat' => $surat,'kategori'=> $kategoriList]);
    }

    public function tampileditArsip($id){
        // dd($request->all());
        $surat = arsipSuratModel::with('kategoriList')->find($id);  
        $kategoriList = kategoriSuratModel::all();
        return view('arsipSuratEdit', ['surat'=> $surat,'kategoriList'=> $kategoriList]);
    }

    public function updateArsip(Request $request, $id) {
        $request->validate([
            'nomorSurat' => 'required',
            'judulSurat' => 'required',
            'kategoriSurat' => 'required',
            'fileSurat' => 'nullable|mimes:pdf|max:2048',
        ], [
            'nomorSurat.required' => 'Nomor Surat harus diisi.',
            'judulSurat.required' => 'Judul Surat harus diisi.',
            'kategoriSurat.required' => 'Kategori Surat harus dipilih.',
            'fileSurat.mimes' => 'File Surat harus berupa PDF.',
            'fileSurat.max' => 'File Surat maksimal 2 Mb.',
        ]);
        // dd($request->all());
        // Mendapatkan data surat yang akan diupdate
        $surat = arsipSuratModel::find($id);

        // Menyimpan file baru jika ada perubahan
        if ($request->hasFile('fileSurat')) {
            $file_surat = $request->file('fileSurat');
            $nama_surat = $file_surat->getClientOriginalName();
            $file_surat->move(public_path('FileArsip/'), $nama_surat);
            // Menghapus file lama jika ada
            if ($surat->fileSurat) {
                unlink(public_path('FileArsip/' . $surat->fileSurat));
            }
            $surat->fileSurat = $nama_surat;
        }

        // Update data surat
        $surat->nomorSurat = $request->nomorSurat;
        $surat->judulSurat = $request->judulSurat;
        $surat->kategoriSurat = $request->kategoriSurat;
        $surat->updated_at = Carbon::now();

        // Simpan perubahan
        $surat->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Surat arsip berhasil diubah.', 'success');

        return redirect('/arsipSurat');
    }

    public function tampilDashboard(Request $request){
        // dd($request->all());
        $surat = arsipSuratModel::count();
        $kategoriAktif = kategoriSuratModel::count();
        return view("/dashboard", compact("surat", "kategoriAktif"));
        // return view('dashboard');
    }

    public function unduhFileSurat($id)
    {
        $surat = arsipSuratModel::find($id);
        
        if (!$surat || $surat->fileSurat === '-') {
            // Handle jika surat tidak ditemukan atau fileSurat bernilai '-'
            alert()->error('Unduhan Gagal','File Dokumen Tidak Ditemukan');
            return redirect()->back();
        }

        $filePath = public_path('FileArsip/' . $surat->fileSurat);

        if (file_exists($filePath)) {
            alert()->success('Unduhan Berhasil','File Dokumen telah didownload');
            return response()->download($filePath, $surat->fileSurat);
        } else {
            // Handle jika file tidak ditemukan
            return redirect()->back()->with('error', 'File dokumen tidak ditemukan.');
        }
    }

    public function hapusArsip($id){
        $arsip = arsipSuratModel::find($id);

        if (!$arsip) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan.');
        }

        // Hapus file_surat dari folder File Arsip menggunakan unlink
        $fileSuratPath = public_path('FileArsip') . '/' . $arsip->fileSurat;

        if (file_exists($fileSuratPath)) {
            unlink($fileSuratPath);
        }

        // Hapus record dari database
        $arsip->delete();

        toast('Surat berhasil dihapus.', 'success');
        return redirect('/arsipSurat');
    }
    
}
