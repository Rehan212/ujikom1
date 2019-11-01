<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    protected $table = 'detail_pinjams';
    public function buku()
    {
        return $this->belongsTo('App\Buku', 'buku_kode');
    }
    public function peminjaman()
    {
        return $this->belongsTo('App\Peminjaman', 'peminjaman_kode');
    }
}
