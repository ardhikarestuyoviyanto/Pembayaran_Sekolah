<?php

namespace Modules\Pembayaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pembayaran\Entities\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        $data = [
            'pembayaran' => $pembayaran
        ];
        return view('pembayaran::index', $data)->with(['sidebar' => 'Pembayaran']);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pembayaran = new Pembayaran;
        return view('pembayaran::create')->with(['sidebar' => 'Pembayaran']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $pembayaran = new Pembayaran;
        $pembayaran->nama_pembayaran = $request->nama_pembayaran;
        $pembayaran->nominal = $request->nominal;
        $pembayaran->save();

        return redirect('admin/modultagihan/pembayaran')->with(['sidebar' => 'Tambah Data pembayaran', 'pesan' => 'Data pembayaran berhasil disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pembayaran::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);
        $data = [
            'pembayaran' => $pembayaran
        ];
        return view('pembayaran::edit', $data)->with(['sidebar' => 'Pembayaran']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->nama_pembayaran = $request->nama_pembayaran;
        $pembayaran->nominal = $request->nominal;
        $pembayaran->save();

        return redirect('admin/modultagihan/pembayaran')->with(['sidebar' => ' Data pembayaran', 'pesan' => 'Data pembayaran berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        return redirect('admin/modultagihan/pembayaran')->with(['sidebar' => 'Data pembayaran', 'pesan' => 'Data pembayaran berhasil dihapus']);
    }
}
