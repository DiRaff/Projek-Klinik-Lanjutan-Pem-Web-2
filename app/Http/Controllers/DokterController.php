<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dokter'] = \App\Models\Dokter::paginate(5);
        $data['judul'] = 'Data-Data Dokter';
        return view('dokter_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dokter'] = new \App\Models\Dokter();
        $data['route'] = 'dokter.store';
        $data['method'] = 'POST';
        $data['tombol'] = 'SIMPAN';
        $data['judul'] = 'Tambah Dokter';
        $data['list_sp'] = [
            'Umum' => 'Umum',
            'Mata' => 'Mata',
            'Kandungan' => 'Kandungan',
            'Gigi' => 'Gigi',
            'Anak' => 'Anak',
            'Psikologi' => 'Psikologi',
            'Jantung' => 'Jantung',
        ];
        return view('dokter_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'id' => 'required|unique:dokters,id',
            'kode_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required',

        ]);
        $dokter = new \App\Models\Dokter();
        $dokter->fill($validasiData);
        $dokter->save();

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
        $data['dokter'] = \App\Models\Dokter::findOrFail($id);
        $data['route'] = ['dokter.update', $id];
        $data['method'] = 'put';
        $data['tombol'] = 'Update';
        $data['judul'] = 'Edit Data Dokter';
        $data['list_sp'] = [
            '' => 'Pilih Spesialis',
            'jantung' => 'Jantung',
            'tht' => 'THT',
        ];
        return view('dokter_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'id' => 'required|unique:dokters,id,' . $id,
            'kode_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required',


        ]);
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->fill($validasiData);
        $dokter->save();

        flash('Data Berhasil Dirubah');
        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->delete();
        flash('Data Berhasil Dihapus');
        return back();
    }
    public function laporan()
    {
        $data['dokter'] = \App\Models\Dokter::all();
        $data['judul'] = 'Laporan Data Dokter';
        return view('dokter_laporan', $data);
    }
}
