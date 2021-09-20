<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Dashboard extends Controller
{
    public function index(){

        $data = array(
            'totalpembayaran' => count(DB::table('tb_pembayaran')->get()),
            'totalkelas' => count(DB::table('tb_kelas')->get()),
            'totalsiswa' => count(DB::table('tb_siswa')->get())
        );

        return view('admin/dashboard/dashboard', $data)->with(['sidebar'=>'Dashboard']);

    }
}
