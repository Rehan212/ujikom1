<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use App\Peminjaman;
use App\Petugas;
use Session;
use File;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
         Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil menampilkan"
        ]);
        return view('backend.peminjaman.index',compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = Petugas::all();
        $peminjaman = Peminjaman::all();
        $peminjam = Peminjam::all();
        return view('backend.peminjaman.create', compact('peminjaman', 'petugas', 'peminjam'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peminjaman = new Peminjaman;
        $peminjaman->peminjaman_kode = $request->peminjaman_kode;
        $peminjaman->petugas_kode = $request->petugas_nama;
        $peminjaman->peminjam_kode = $request->peminjam_nama;
        $peminjaman->peminjaman_tgl = $request->peminjaman_tgl;
        $peminjaman->peminjaman_tgl_kembali = $request->peminjaman_tgl_kembali;
        $peminjaman->save();
        return redirect()->route('peminjaman.index')->with('success', 'Berhasil ditambah');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::all();
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjam = Peminjam::all();
        return view('backend.peminjaman.edit', compact('peminjaman', 'petugas', 'peminjam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->peminjaman_kode = $request->peminjaman_kode;
        $peminjaman->petugas_kode = $request->petugas_nama;
        $peminjaman->peminjam_kode = $request->peminjam_nama;
        $peminjaman->peminjaman_tgl = $request->peminjaman_tgl;
        $peminjaman->peminjaman_tgl_kembali = $request->peminjaman_tgl_kembali;
        $peminjaman->save();
        return redirect()->route('peminjaman.index')->with('success', 'Berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::destroy($id);
        return redirect()->route('peminjaman.index')->with('success', 'Berhasil dihapus');
    }
}
