<?php

namespace Modules\Siswa\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kelas\Entities\Kelas;
use Modules\Siswa\Entities\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $siswa = Siswa::join('tb_kelas', 'tb_kelas.id_kelas', '=', 'tb_siswa.id_kelas')
            ->select('tb_siswa.*', 'tb_kelas.*')
            ->get();
        $data = [
            'siswa' => $siswa
        ];
        return view('siswa::index', $data)->with(['sidebar' => 'Data Siswa']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $siswa = new Siswa;
        $kelas = Kelas::all();
        $data = [
            'siswa' => $siswa,
            'kelas' => $kelas
        ];
        return view('siswa::create', $data)->with(['sidebar' => 'Data Siswa']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $siswa = new Siswa;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->alamat = $request->alamat;
        $siswa->password = password_hash($request->password, PASSWORD_DEFAULT);
        $siswa->save();

        return redirect('admin/modulsiswa/siswa')->with(['sidebar' => 'Tambah Data Siswa', 'pesan' => 'Data berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('siswa::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $data = [
            'siswa' => $siswa,
            'kelas' => $kelas
        ];
        return view('siswa::edit', $data)->with(['sidebar' => 'Data Siswa']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->id_kelas = $request->id_kelas;
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->alamat = $request->alamat;
        $siswa->password = password_hash($request->password, PASSWORD_DEFAULT);
        $siswa->save();

        return redirect('admin/modulsiswa/siswa')->with(['sidebar' => 'Edit Data siswa', 'pesan' => 'Data siswa berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('admin/modulsiswa/siswa')->with(['sidebar' => 'Data Siswa', 'pesan' => 'Data siswa berhasil dihapus']);
    }
}
