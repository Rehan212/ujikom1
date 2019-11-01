<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
      public function buku()
    {
        return $this->hasMany('App\Buku', 'id_kategori');
    }
    public static function boot(){
        parent::boot();
        self::deleting(function($kategori){
            //mengecek apakah kategori masih digunakan oleh artikel
            if ($kategori->buku->count() > 0){
                //menyimpan pesan error
                $html = 'Kategori tidak bisa dihapus karena masih digunakan oleh Buku';
                $html .= '<ul>';
                foreach ($kategori->buku as $data){
                    $html .= "<li>$data->judul</li>";
                }
                $html .= '</ul>';
                Session::flash('flash_notification', [
                    "level" => "danger", 
                    "message" => $html
                ]);
                //membatalkan proses penghapusan
                return false;
            }
        });
    }
}
