<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index(){
        $judul = "Halaman Data Jurusan";
        $jurusan = Jurusan::all();
        return view('belakang.admin.jurusan.index', compact('judul', 'jurusan'));
    }

    public function create(){
        $judul = "Halaman Data Jurusan";
        return view('belakang.admin.jurusan.create', compact('judul'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required'
        ]);

        Jurusan::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect()->route('dataJurusan')->with(['success', 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required'
        ]);
        $jurusan = Jurusan::findOrFail($id);

        $jurusan->update([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect()->route('dataJurusan')->with(['success', 'Data Berhasil Disimpan!']);
    }

    public function destroy($id){
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('dataJurusan')->with(['success', 'Data Berhasil Disimpan!']);
    }
}
