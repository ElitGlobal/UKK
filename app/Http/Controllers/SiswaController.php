<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $judul = "Halaman Data Siswa";
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $jurusan = Jurusan::all();
        return view('belakang.admin.siswa.index', compact('judul','kelas', 'siswa', 'jurusan'));
    }

    public function create(){
        $judul = "Halaman Data Siswa";

        return view('belakang.admin.siswa.create', compact('judul', ));
    }
}
