<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Setting extends Controller
{
    
    public function index(){

        $data = array(
            'admin' => DB::table('tb_admin')->get(),
            'midtrans' => DB::table('tb_midtrans')->get(),
        );

        return view('admin/setting/setting', $data)->with(['sidebar'=>'Setting']); 

    }

    public function updateadmin(Request $request){

        if(empty($_POST['password'])){

            $data = array(
                'username' => $request->input('username'),
                'nama' => $request->input('nama'),
            );

        }else{

            $data = array(
                'username' => $request->input('username'),
                'nama' => $request->input('nama'),
                'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)
            );

        }

        DB::table('tb_admin')->update($data);

        return response()->json([
            'message' => 'Update Admin Berhasil'
        ]);

    }

    public function updatemidtrans(Request $request){

        $data = array(
            'id_merchant' => $request->input('id_merchant'),
            'client_key' => $request->input('client_key'),
            'servey_key' => $request->input('servey_key'),
        );

        DB::table('tb_midtrans')->update($data);

        return response()->json([
            'message' => 'Update Data Midtrans Berhasil'
        ]);

    }

}
