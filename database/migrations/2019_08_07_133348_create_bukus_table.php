<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('buku_kode')->unique();
            $table->string('buku_judul');
            $table->bigInteger('buku_jumlah');
            $table->string('buku_deskripsi');
            $table->string('buku_pengarang');
            $table->Date('buku_tahun_terbit');
            $table->unsignedBigInteger('kategori_kode');
            $table->foreign('kategori_kode')->references('id')->on('kategoris')->ondelete('cascade');
            $table->unsignedBigInteger('penerbit_kode');
            $table->foreign('penerbit_kode')->references('id')->on('penerbits')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
