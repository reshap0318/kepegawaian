<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->date('tanggal');
            $table->string('tipe_absen');
            $table->unsignedBigInteger('absensi_cuti_id')->nullable();
            $table->unsignedBigInteger('shift_id');
            $table->string('status');
            $table->time('waktu_masuk');
            $table->time('waktu_keluar');
            $table->integer('pengurangan_remun');
            $table->text('keterangan');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('absensi_cuti_id')->references('id')->on('absensi_cuti')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('shift_id')->references('id')->on('absensi_shift')->onDelete('cascade')->onUpdate('cascade'); 
            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
