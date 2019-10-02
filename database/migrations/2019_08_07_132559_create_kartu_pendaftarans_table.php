<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_pendaftarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('kartupendaftaran_kode')->unique();
            $table->Date('kartu_tanggal_pembuatan');
            $table->Date('kartu_tanggal_akhir');
            $table->Boolean('kartu_status_aktif');
            $table->unsignedBigInteger('petugas_kode');
            $table->foreign('petugas_kode')->references('id')->on('petugas')->ondelete('cascade');
            $table->unsignedBigInteger('peminjam_kode');
            $table->foreign('peminjam_kode')->references('id')->on('peminjams')->ondelete('cascade');
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
        Schema::dropIfExists('kartu_pendaftarans');
    }
}
