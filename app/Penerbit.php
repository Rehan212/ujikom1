<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
     public function buku()
    {
        return $this->hasMany('App\Buku');
    }
}
