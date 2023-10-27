<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $judul = "Halaman Data Guru";
        return view('belakang.admin.guru.index', compact('judul'));
    }

    public function create(){
        $judul = "Halaman Data Guru";
        return view('belakang.admin.guru.create', compact('judul'));
    }
}
