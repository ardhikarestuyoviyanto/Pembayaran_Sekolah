<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{

    public function index(){
        
        return view('auth/login');
        
    }

    public function proseslogin(Request $request){

        if($request->input('role') == 'admin'){

            $res = DB::table('tb_admin')->where('username', $request->input('username'))->get();

            if(empty($res)){

                return response()->json([
                    'message' => 'Username atau Password Salah',
                    'isLogin' => false,
                    'debug' => $res
                ]);

            }else{

                foreach($res as $x){

                    if(password_verify($request->input('password'), $x->password)){

                        $session = array(
                            'isLogin' => true,
                            'nama' => $x->nama
                        );
        
                        $request->session()->put($session);
        
                        return response()->json([
                            'isLogin' => true,
                            'location' => 'admin'
                        ]);

                    }

                }

                return response()->json([
                    'isLogin' => false,
                    'error' => "Username atau Password Salah",
                    'debug' => $res
                ]);

            }

        }else{

            $res = DB::table('tb_siswa')->where('nis', $request->input('username'))->get();

            if(empty($res)){

                return response()->json([
                    'message' => 'Nis atau Password Salah',
                    'isLogin' => false,
                    'debug' => $res
                ]);

            }else{

                foreach($res as $x){

                    if(password_verify($request->input('password'), $x->password)){

                        $session = array(
                            'isLogin' => true,
                            'nama_siswa' => $x->nama_siswa,
                            'id_siswa' => $x->id_siswa
                        );
        
                        $request->session()->put($session);
        
                        return response()->json([
                            'isLogin' => true,
                            'location' => 'siswa'
                        ]);

                    }

                }

                return response()->json([
                    'isLogin' => false,
                    'error' => "Nis atau Password Salah",
                    'debug' => $res
                ]);

            }

        }

    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->to('/');
    }

}
