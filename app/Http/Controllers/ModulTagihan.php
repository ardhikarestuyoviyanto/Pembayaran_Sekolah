<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulTagihan extends Controller
{
    public function pembayaran(){

        $data = array(
            'data' => DB::table('tb_pembayaran')->orderBy('id_pembayaran', 'DESC')->get()
        );

        return view('admin/modultagihan/datapembayaran', $data)->with(['sidebar'=>'Data Pembayaran']);        

    }    

    public function insertpembayaran(Request $request){

        $data = array(
            'nama_pembayaran' => $request->input('nama_pembayaran'),
            'nominal' => $request->input('nominal'),
        );

        DB::table('tb_pembayaran')->insert($data);

        return response()->json([
            'message' => 'Pembayaran Baru berhasil ditambahkan'
        ]);

    }

    public function getpembayaranbyid(Request $request){

        return response()->json([
            'list' => DB::table('tb_pembayaran')->where('id_pembayaran', $request->input('id_pembayaran'))->get()
        ]);

    }

    public function updatepembayaran(Request $request){

        $data = array(
            'nama_pembayaran' => $request->input('nama_pembayaran'),
            'nominal' => $request->input('nominal'),
        );

        DB::table('tb_pembayaran')->where('id_pembayaran', $request->input('id_pembayaran'))->update($data);

        return response()->json([
            'message' => 'Update Pembayaran Berhasil'
        ]);

    }

    public function deletepembayaran(Request $request){

        DB::table('tb_pembayaran')->where('id_pembayaran', $request->input('id_pembayaran'))->delete();

        return response()->json([
            'message' => 'Hapus Pembayaran Berhasil'
        ]);

    }

    //--------------------------------------------------------------------------------------------------------

    public function setting(Request $request){

        $data = array(
            'tagihan' => DB::table('tb_pembayaran')->where('id_pembayaran', $request->segment(4))->get(),
            'data' => DB::table('tb_tagihan')->join('tb_siswa', 'tb_siswa.id_siswa', '=', 'tb_tagihan.id_siswa')->join('tb_kelas', 'tb_siswa.id_kelas', '=', 'tb_kelas.id_kelas')->where('tb_tagihan.id_pembayaran', $request->segment(4))->orderBy('tb_siswa.id_kelas', "ASC")->get(),
            'id_pembayaran' => $request->segment(4)
        );

        return view('admin/modultagihan/setting', $data)->with(['sidebar'=>'Data Pembayaran']);

    }

    public function addtagihan(Request $request){

        $data = array(
            'tagihan' => DB::table('tb_pembayaran')->where('id_pembayaran', $request->segment(4))->get(),
            'data' => DB::table('tb_kelas')->join('tb_siswa', 'tb_siswa.id_kelas', '=', 'tb_kelas.id_kelas')->orderBy('tb_siswa.id_kelas', "ASC")->get(),
            'id_pembayaran' => $request->segment(4)
        );

        return view('admin/modultagihan/tambah', $data)->with(['sidebar'=>'Data Pembayaran']);

    }

    public function inserttagihan(Request $request){

        if(empty($_POST['id_siswa'])){

            return response()->json([
                'message' => 'Gagal; Checklist minimal 1 siswa'
            ]);

        }else{

            foreach($_POST['id_siswa'] as $x):

                $data = array(
                    'id_siswa' => $x,
                    'id_pembayaran' => $request->input('id_pembayaran'),
                    'status' => 'N'
                );

                DB::table('tb_tagihan')->insert($data);
            
            endforeach;

            return response()->json([
                'message' => count($_POST['id_siswa']).' siswa berhasil ditambahkan ke tagihan'
            ]);

        }

    }

    public function deletetagihan(){

        if(empty($_POST['id_tagihan'])){

            return response()->json([
                'message' => 'Gagal; Checklist minimal 1 data tagihan'
            ]);

        }else{

            foreach($_POST['id_tagihan'] as $x):

                DB::table('tb_tagihan')->where('id_tagihan', $x)->delete();
            
            endforeach;

            return response()->json([
                'message' => count($_POST['id_tagihan']).' tagihan berhasil dihapus'
            ]);

        }

    }

    //-------------------------------------------------------------------------------------------

    public function datatagihan(){

        $data = array(
            'data' => DB::table('tb_siswa')->join('tb_kelas', 'tb_kelas.id_kelas', '=', 'tb_siswa.id_kelas')->orderBy('tb_siswa.id_kelas', 'ASC')->get()
        );

        return view('admin/modultagihan/datatagihan', $data)->with(['sidebar'=>'Data Tagihan']);

    }    

    public function detailtagihan(Request $request){

        $data = array(
            'siswa' => DB::table('tb_siswa')->join('tb_kelas', 'tb_kelas.id_kelas', '=', 'tb_siswa.id_kelas')->where('tb_siswa.id_siswa', $request->segment(4))->get(),
            'data' => DB::table('tb_tagihan')->join('tb_pembayaran', 'tb_pembayaran.id_pembayaran', '=', 'tb_tagihan.id_pembayaran')->where('tb_tagihan.id_siswa', $request->segment(4))->orderBy('tb_tagihan.id_tagihan', "DESC")->get()
        );

        return view('admin/modultagihan/detail', $data)->with(['sidebar'=>'Data Tagihan']);

    }


}
