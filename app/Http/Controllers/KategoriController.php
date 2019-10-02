<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $response = [
            'success'=>true,
            'data'=>$kategori,
            'massage'=>'berhasil'
        
        ];
        return view('backend.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //  $request->validate([
            //     'kategori_kode' => 'required|unique:kategori',
            //     'kategori_nama' => 'required'
            // ]);
        $kategori = new Kategori;
        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;
        $kategori->save();
         Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$kategori->kategori_nama."</b>"
        ]);
            //6.tampilkan berhasil
            return redirect()->route('kategori.index');
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
        $kategori = Kategori::findOrFail($id);
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$kategori->kategori_nama."</b>"
        ]);
        return view('backend.kategori.edit',compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);
        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;
        $kategori->save();
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$kategori->kategori_nama."</b>"
        ]);
           return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori =Kategori::destroy($id);
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit"
        ]);
            return redirect()->route('kategori.index');
    }
}
