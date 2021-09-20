<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Siswa extends Controller
{
    public function dashboard(Request $request){

        $data = array(
            'siswa' => DB::table('tb_siswa')->join('tb_kelas', 'tb_kelas.id_kelas', '=', 'tb_siswa.id_kelas')->where('tb_siswa.id_siswa', $request->session()->get('id_siswa'))->get(),
            'data' => DB::table('tb_tagihan')->join('tb_pembayaran', 'tb_pembayaran.id_pembayaran', '=', 'tb_tagihan.id_pembayaran')->where('tb_tagihan.id_siswa', $request->session()->get('id_siswa'))->orderBy('tb_tagihan.id_tagihan', "DESC")->get()
        );

        return view('siswa/tagihan', $data)->with(['sidebar'=>'Tagihan']);;

    }
}
