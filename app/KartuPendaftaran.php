<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuPendaftaran extends Model
{
    public function peminjam()
    {
        return $this->belongsTo('App\Peminjam', 'peminjam_kode');
    }
    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'petugas_kode');
    }
}
