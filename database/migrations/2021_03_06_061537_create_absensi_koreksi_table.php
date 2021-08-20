<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiKoreksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_koreksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absensi_id');
            $table->string('jenis_permohonan');
            $table->text('alasan');
            $table->timestamp('waktu_koreksi');
            $table->unsignedBigInteger('atasan_id');
            $table->unsignedBigInteger('pejabat_id');
            $table->date('tgl_persetujuan_atasan')->nullable();
            $table->date('tgl_persetujuan_pejabat')->nullable();
            $table->timestamps();

            $table->foreign('absensi_id')->references('id')->on('absensi')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('absensi_koreksi');
    }
}
