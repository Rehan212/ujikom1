<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerbit;
use Session;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::all();
        $response = [
            'success'=>true,
            'data'=>$penerbit,
            'massage'=>'berhasil'
        
        ];
        return view('backend.penerbit.index',compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.penerbit.create');
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
            //     'penerbit_kode' => 'required|unique:penerbit',
            //     'penerbit_nama' => 'required'
            // ]);
        $penerbit = new Penerbit;
        $penerbit->penerbit_kode = $request->penerbit_kode;
        $penerbit->penerbit_nama = $request->penerbit_nama;
        $penerbit->penerbit_alamat = $request->penerbit_alamat;
        $penerbit->penerbit_telp = $request->penerbit_telp;
        $penerbit->save();
         Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$penerbit->penerbit_nama."</b>"
        ]);
            //6.tampilkan berhasil
            return redirect()->route('penerbit.index');
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
        $penerbit = Penerbit::findOrFail($id);
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$penerbit->penerbit_nama."</b>"
        ]);
        return view('backend.penerbit.edit',compact('penerbit'));
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
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->penerbit_kode = $request->penerbit_kode;
        $penerbit->penerbit_nama = $request->penerbit_nama;
        $penerbit->penerbit_alamat = $request->penerbit_alamat;
        $penerbit->penerbit_telp = $request->penerbit_telp;
        $penerbit->save();
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$penerbit->penerbit_nama."</b>"
        ]);
           return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerbit =Penerbit::destroy($id);
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit"
        ]);
            return redirect()->route('penerbit.index');
    }
}
