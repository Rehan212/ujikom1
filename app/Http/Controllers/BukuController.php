<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Penerbit;
use App\Kategori;
use Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "berhasil menampilkan"
        ]);
        return view('backend.buku.index', compact('buku', 'penerbit', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        $penerbit = Penerbit::all();
        return view('backend.buku.create', compact('buku', 'kategori', 'penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->buku_kode = $request->buku_kode;
        $buku->buku_judul = $request->buku_judul;
        $buku->buku_jumlah = $request->buku_jumlah;
        $buku->buku_pengarang = $request->buku_pengarang;
        $buku->buku_tahun_terbit = $request->buku_tahun_terbit;
        $buku->buku_deskripsi = $request->buku_deskripsi;
        $buku->kategori_kode = $request->kategori_nama;
        $buku->penerbit_kode = $request->penerbit_nama;
        $buku->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                . $buku->buku_judul . "</b>"
        ]);
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::all();
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        return view('backend.buku.show', compact('buku', 'kategori', 'penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        return view('backend.buku.edit', compact('buku', 'kategori', 'penerbit'));        
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
        $buku = Buku::findOrFail($id);
        $buku->buku_kode = $request->buku_kode;
        $buku->buku_judul = $request->buku_judul;
        $buku->buku_jumlah = $request->buku_jumlah;
        $buku->buku_pengarang = $request->buku_pengarang;
        $buku->buku_tahun_terbit = $request->buku_tahun_terbit;
        $buku->buku_deskripsi = $request->buku_deskripsi;
        $buku->kategori_kode = $request->kategori_nama;
        $buku->penerbit_kode = $request->penerbit_nama;
        $buku->save();
        return redirect()->route('buku.index')->with('success', 'Berhasil diedit');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::destroy($id);
        return redirect()->route('buku.index')->with('success', 'Berhasil dihapus');
    }
}
