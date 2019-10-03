<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
     public function petugas()
    {
        return $this->belongsTo('App\Petugas');
    }

     public function peminjam()
    {
        return $this->belongsTo('App\Peminjam');
    }
}
