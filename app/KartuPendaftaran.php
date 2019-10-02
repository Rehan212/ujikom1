<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuPendaftaran extends Model
{
     public function peminjam()
    {
        return $this->belongsTo('App\Peminjam');
    }
     public function petugas()
    {
        return $this->belongsTo('App\Petugas');
    }
}
