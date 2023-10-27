<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index(){
        $judul = "Halaman Data Mapel";
        $mapel = Mapel::all();
        return view('belakang.admin.mapel.index', compact('judul', 'mapel'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        Mapel::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
        ]);

        return redirect()->route('dataMapel')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);
        $mapel = Mapel::findOrFail($id);

        $mapel->update([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel
        ]);

        return redirect()->route('dataMapel')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id){
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->route('dataMapel')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
