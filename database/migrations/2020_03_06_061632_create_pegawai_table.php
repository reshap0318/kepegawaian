<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('nama');
            $table->string('gelar_depan');
            $table->string('gelar_belakang');
            $table->unsignedBigInteger('unit_id');
            $table->text('alamat');
            $table->string('geo_alamat');
            $table->string('nip');
            $table->boolean('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nidn');
            $table->string('npwp');
            $table->string('tipe');
            $table->boolean('ikatan_kerja');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->tinyInteger('status');
            $table->date('tgl_pensiun');
            $table->string('file_sk_cpns');
            $table->string('file_sk_pns');
            $table->timestamps();


            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade')->onUpdate('cascade');   
            
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
