<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::paginate(5);
        $data['judul'] = 'Data-Data Pasien';
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pasien'] = new \App\Models\Pasien();
        $data['route'] = 'pasien.store';
        $data['method'] = 'POST';
        $data['tombol'] = 'SIMPAN';
        $data['judul'] = 'Tambah Pasien';
        $data['list_sp'] = [
            'pria' => 'Pria',
            'wanita' => 'Wanita',
        ];
        return view('pasien_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'id' => 'required|unique:pasiens,id',
            'kode_pasien' => 'required',
            'nama_pasien' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',


        ]);
        $pasien = new \App\Models\Pasien();
        $pasien->fill($validasiData);
        $pasien->save();

        flash('Data Berhasil disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        $data['route'] = ['pasien.update', $id];
        $data['method'] = 'put';
        $data['tombol'] = 'Update';
        $data['judul'] = 'Edit Data Pasien';
        $data['list_sp'] = [
            '' => 'Pilih Kelamin',
            'pria' => 'Pria',
            'wanita' => 'Wanita',
        ];
        return view('pasien_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'id' => 'required|unique:pasiens,id,' . $id,
            'kode_pasien' => 'required',
            'nama_pasien' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',


        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($validasiData);
        $pasien->save();

        flash('Data Berhasil Dirubah');
        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = \App\Models\Pasien::findOrFail($id);
        $dokter->delete();
        flash('Data Berhasil Dihapus');
        return back();
    }
    public function laporan()
    {
        $data['pasien'] = \App\Models\Pasien::all();
        $data['judul'] = 'Laporan Data Pasien';
        return view('pasien_laporan', $data);
    }
}
