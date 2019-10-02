<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use Session;
use File;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $peminjam = Peminjam::all();
         Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil menampilkan"
        ]);
        return view('backend.peminjam.index',compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.peminjam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'peminjam_kode' => 'required|unique:peminjams',
        //     'peminjam_nama' => 'required',
        //     'peminjam_alamat' => 'required',
        //     'peminjam_telp' => 'required',
        //     'peminjam_foto' => 'required'
        // ]);
        $peminjam = new Peminjam;
       $peminjam->peminjam_kode = $request->peminjam_kode;
       $peminjam->peminjam_nama = $request->peminjam_nama;
         $peminjam->peminjam_alamat = $request->peminjam_alamat;
           $peminjam->peminjam_telp = $request->peminjam_telp;
             if ($request->hasFile('peminjam_foto')) {
            $file = $request->file('peminjam_foto');
            $path = public_path().'/assets/img/peminjam/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $upload = $file->move($path, $filename);

            if($peminjam->foto){
                $old_foto = $peminjam->foto;
                $filepath = public_path().'/assets/img/peminjam/'.$peminjam->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    //Exception $e;
                }
            }
            $peminjam->foto = $filename;
        }
       $peminjam->save();
         Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$peminjam->peminjam_nama."</b>"
        ]);
            //6.tampilkan berhasil
            return redirect()->route('peminjam.index');
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
        $peminjam = Peminjam::findOrFail($id);
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit <b>"
                        .$peminjam->peminjam_nama."</b>"
        ]);
        return view('backend.peminjam.edit',compact('peminjam'));
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
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->peminjam_kode = $request->peminjam_kode;
        $peminjam->peminjam_nama = $request->peminjam_nama;
        $peminjam->peminjam_alamat = $request->peminjam_alamat;
        $peminjam->peminjam_telp = $request->peminjam_telp;

        if ($request->hasFile('peminjam_foto')) {
            $file = $request->file('peminjam_foto');
            $destinationPath = public_path() . '/assets/img/peminjam/';
            $filename = str_random(6) . '_' . '/assets/img/peminjam/';
            $upload = $file->move($destinationPath, $filename);
        }

        if ($peminjam->foto)    {
            $old_foto = $peminjam->foto;
            $filepath = public_path() . '/assets/img/' . $peminjam->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
            
            $peminjam->save();
            Session::flash("flash_notification",[
                "level" => "success",
                "message" => "berhasil mengedit <b>"
                         .$peminjam->peminjam_nama."</b>"
            ]);
        return redirect()->route('peminjam.index');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $peminjam =Peminjam::destroy($id);
           Session::flash("flash_notification",[
            "level" => "success",
            "message" => "berhasil mengedit"
        ]);
            return redirect()->route('peminjam.index');
    }
}
