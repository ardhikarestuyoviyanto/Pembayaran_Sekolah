<?php

namespace Modules\Kelas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kelas\Entities\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $kelas = Kelas::all();
        $data = [
            'kelas' => $kelas
        ];
        return view('kelas::index', $data)->with(['sidebar' => 'Data Kelas']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $kelas = new Kelas;
        return view('kelas::create')->with(['sidebar' => 'Data Kelas']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();

        return redirect('admin/modulsiswa/kelas')->with(['sidebar' => 'Data Kelas', 'pesan' => 'Data berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('kelas::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $data = [
            'kelas' => $kelas
        ];
        return view('kelas::edit', $data)->with(['sidebar' => 'Data Kelas']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();
        return redirect('admin/modulsiswa/kelas')->with(['sidebar' => 'Data Kelas', 'pesan' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('admin/modulsiswa/kelas')->with(['sidebar' => 'Data Kelas', 'pesan' => 'Kelas berhasil dihapus']);
    }
}
