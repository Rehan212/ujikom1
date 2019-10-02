<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
     public function penerbit()
    {
        return $this->belongsTo('App\Penerbit');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

     public function detail()
    {
        return $this->hasMany('App\DetailPinjam');
    }
}
