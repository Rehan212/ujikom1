<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public function penerbit()
    {
        return $this->belongsTo('App\Penerbit', 'penerbit_kode');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_kode');
    }
    public function detail()
    {
        return $this->hasMany(' App\DetailPinjam');
    }
}
