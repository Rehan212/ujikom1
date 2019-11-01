<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPinjam;
use App\Buku;
use App\Peminjaman;
use Session;


class DetailpinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailpinjam = DetailPinjam::all();
        Session::flash("flash_notification",[
           "level" => "success",
           "message" => "berhasil menampilkan"
       ]);
       return view('backend.detailpinjam.index',compact('detailpinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailpinjam = DetailPinjam::all();
        $buku = Buku::all();
        $peminjaman = Peminjaman::all();
        return view('backend.detailpinjam.create', compact('detailpinjam', 'buku', 'peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detailpinjam = new DetailPinjam;
        $detailpinjam->detailpinjam_kode = $request->detail_kode;
        $detailpinjam->detail_status_kembali = $request->detail_status_kembali;
        $detailpinjam->detail_denda = $request->detail_denda;
        $detailpinjam->detail_tgl_kembali = $request->detail_tgl_kembali;
        $detailpinjam->peminjaman_kode = $request->peminjaman_kode;
        $detailpinjam->buku_kode = $request->buku_judul;
        $detailpinjam->save();
        return redirect()->route('detailpinjam.index')->with('success', 'Berhasil ditambah');;
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
        $detailpinjam = DetailPinjam::findOrFail($id);
        $buku = Buku::all();
        $peminjaman = Peminjaman::all();
        return view('backend.detailpinjam.edit', compact('detailpinjam', 'buku', 'peminjaman'));
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
        $detailpinjam = DetailPinjam::findOrFail($id);
        $detailpinjam->detailpinjam_kode = $request->detail_kode;
        $detailpinjam->detail_status_kembali = $request->detail_status_kembali;
        $detailpinjam->detail_denda = $request->detail_denda;
        $detailpinjam->detail_tgl_kembali = $request->detail_tgl_kembali;
        $detailpinjam->peminjaman_kode = $request->peminjaman_kode;
        $detailpinjam->buku_kode = $request->buku_judul;
        $detailpinjam->save();
        return redirect()->route('detailpinjam.index')->with('success', 'Berhasil diedit');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailpinjam = DetailPinjam::destroy($id);
        return redirect()->route('detailpinjam.index')->with('success', 'Berhasil dihapus');
    }
}
