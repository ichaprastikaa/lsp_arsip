<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriSuratModel;

class kategoriSuratController extends Controller{
    //
    public function tampilKategori(Request $request){
        // dd($request->all());
        $dataKategori = kategoriSuratModel::all();

        return view('kategoriSurat', ['dataKategori'=>$dataKategori]);
    }
    
    public function tampilFormTambahKategori(Request $request){
        // dd($request->all());
        // Mendapatkan kdKategori Terakhir
        $lastBidang = kategoriSuratModel::withTrashed()->orderBy('kdKategori', 'desc')->first();
        $lastKd = $lastBidang ? intval(substr($lastBidang->kdKategori, 1)) : 0;

        $nomorKategori = 'K' . str_pad($lastKd + 1, 3, '0', STR_PAD_LEFT);
        return view('kategoriSuratTambah', ['nomorKategori'=> $nomorKategori]);
    }

    public function tambahKategori(Request $request){
        // dd($request->all());
        $request->validate([
            'namaKategori' => 'required',
            'keterangan' => 'nullable',
        ], [
            'kdKategori.required' => 'Kode Kategori harus di isi.',
            'kdKategori.unique' => 'Kode Kategori sudah digunakan.',
            'namaKategori.required' => 'Nama Kategori harus di isi.',
        ]);
        // dd($request->all());
        if($request->keterangan== null){
            $keterangan = '-';
        }else{
            $keterangan = $request->keterangan;
        }

        // Buat instansiasi objek KategoriSurat dengan data input
        $kategoriSurat = new kategoriSuratModel();
        $kategoriSurat->kdKategori = $request->kdKategori;
        $kategoriSurat->namaKategori = $request->namaKategori;
        $kategoriSurat->keterangan = $keterangan;
        
        // Simpan kategoriSurat ke database
        $kategoriSurat->save();

        // Redirect atau berikan respon sesuai kebutuhan
        toast('Kategori Surat berhasil ditambahkan.', 'success');
        return redirect('/kategoriSurat');
    }

    public function tampilFormEditKategori($kdKategori){
        $lihatKategori = kategoriSuratModel::find($kdKategori);

        return view('kategoriSuratEdit', ['lihatKategori' => $lihatKategori]);
    }

    public function editKategori(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'namaKategori' => 'required',
            'keterangan' => 'nullable',
        ], [
            'kdKategori.required' => 'Kode Kategori harus di isi.',
            'kdKategori.unique' => 'Kode Kategori sudah digunakan.',
            'namaKategori.required' => 'Nama Kategori harus di isi.',
        ]);

        $data = kategoriSuratModel::find($id);
        $data->namaKategori = $request->namaKategori;
        $data->keterangan = $request->keterangan;

        $data->save();

        toast('Data berhasil Diubah','success');
        return redirect('/kategoriSurat');
    }

    public function hapusKategori($kdKategori){
        $data = kategoriSuratModel::find($kdKategori);
        $data->delete();

        toast('Data berhasil dihapus','success');
        return redirect('/kategoriSurat');
    }

}
