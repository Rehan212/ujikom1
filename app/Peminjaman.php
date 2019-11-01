<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'petugas_kode');
    }
    public function peminjam()
    {
        return $this->belongsTo('App\Peminjam', 'peminjam_kode');
    }
    public function detailpinjam()
    {
        return $this->belongsTo('App\DetailPeminjam', 'peminjaman_kode');
    }
}
