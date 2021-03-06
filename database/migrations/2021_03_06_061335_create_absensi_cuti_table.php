<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_cuti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->string('jenis_cuti');
            $table->text('domisili');
            $table->string('kontak');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->text('alasan');
            $table->string('status_pengajuan');
            $table->unsignedBigInteger('atasan_id');
            $table->date('tgl_persetujuan_atasan');
            $table->unsignedBigInteger('pejabat_id');
            $table->date('tgl_persetujuan_pejabat');
            $table->string('file_surat');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('atasan_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pejabat_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi_cuti');
    }
}
