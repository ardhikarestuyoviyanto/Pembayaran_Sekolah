<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Veritrans_Config;
use Veritrans_Snap;

class Siswa extends Controller
{

    public function __construct(){

        Veritrans_Config::$serverKey = 'SB-Mid-server-RWyqlRKAOTkMTVPleUoETwG-';
        Veritrans_Config::$isProduction = false;
        Veritrans_Config::$isSanitized = true;
        Veritrans_Config::$is3ds = true;

    }

    public function dashboard(Request $request){

        $data = array(
            'siswa' => DB::table('tb_siswa')->join('tb_kelas', 'tb_kelas.id_kelas', '=', 'tb_siswa.id_kelas')->where('tb_siswa.id_siswa', $request->session()->get('id_siswa'))->get(),
            'data' => DB::table('tb_tagihan')->join('tb_pembayaran', 'tb_pembayaran.id_pembayaran', '=', 'tb_tagihan.id_pembayaran')->where('tb_tagihan.id_siswa', $request->session()->get('id_siswa'))->orderBy('tb_tagihan.id_tagihan', "DESC")->get()
        );

        return view('siswa/tagihan', $data)->with(['sidebar'=>'Tagihan']);;

    }

    public function pay(Request $request){

        $res = DB::table('tb_pembayaran')->join('tb_tagihan', 'tb_pembayaran.id_pembayaran', '=', 'tb_tagihan.id_pembayaran')->join('tb_siswa', 'tb_siswa.id_siswa', '=', 'tb_tagihan.id_siswa')->where('tb_tagihan.id_tagihan', $request->input('id_tagihan'))->get();

        foreach($res as $x){

            $params = [
                'transaction_details' => [
                    'order_id' => $x->id_tagihan,
                    'gross_amount' => $x->nominal,
                ],
                'item_details' => [
                    [
                        'id' => $x->id_tagihan,
                        'price' => $x->nominal,
                        'quantity' => 1,
                        'name' => $x->nama_pembayaran,
                    ],
                ],
                'customer_details' => [
                    'first_name' => $x->nama_siswa,
                    'address' => $x->alamat,
                    'email' => "ardhikayoviyanto@gmail.com",
                    'phone' => "081322311801",
                ]
            ];

        }

        $snap_token = Veritrans_Snap::getSnapToken($params);

        return ['snap_token' => $snap_token];

    }

    public function updatetagihan(Request $request){

        $data = array(
            'payment_type' => $request->input('payment_type'),
            'tgl_bayar' => $request->input('tgl_bayar'),
            'status' => 'Y',
        );

        DB::table('tb_tagihan')->where('id_tagihan', $request->id_tagihan)->update($data);

        return response()->json([
            'message' => 'Pembayaran Berhasil Dilakukan'
        ]);

    }

}
