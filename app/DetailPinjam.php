<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
     public function buku()
    {
        return $this->belongsTo('App\Buku');
    }

     public function peminjaman()
    {
        return $this->belongsTo('App\Peminjaman');
    }
}
