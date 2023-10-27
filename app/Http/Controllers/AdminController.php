<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $judul = "Selamat datang Admin";
        return view('belakang.admin.dashboard', compact('judul'));
    }
}
