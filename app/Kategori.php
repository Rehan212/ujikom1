<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
      public function buku()
    {
        return $this->hasMany('App\Buku');
    }
}
