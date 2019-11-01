<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('detailpinjam_kode')->unique();
            $table->unsignedBigInteger('detail_tgl_kembali');
            $table->foreign('detail_tgl_kembali')->references('id')->on('peminjaman')->ondelete('cascade');
            $table->double('detail_denda');
            $table->String('detail_status_kembali');
            $table->unsignedBigInteger('peminjaman_kode');
            $table->foreign('peminjaman_kode')->references('id')->on('peminjaman')->ondelete('cascade');
            $table->unsignedBigInteger('buku_kode');
            $table->foreign('buku_kode')->references('id')->on('bukus')->ondelete('cascade');
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
        Schema::dropIfExists('detail_pinjams');
    }
}
