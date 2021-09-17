<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModulSiswa extends Controller
{
    public function siswa(){

        return view('admin/modulsiswa/siswa')->with(['sidebar'=>'Data Siswa']);

    }

    public function kelas(){

        return view('admin/modulsiswa/kelas')->with(['sidebar'=>'Data Kelas']);

    }
}
