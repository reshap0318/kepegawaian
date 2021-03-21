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
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->text('alamat')->nullable();
            $table->string('geo_alamat')->nullable();
            $table->string('nip');
            $table->boolean('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('nidn')->nullable();
            $table->string('npwp')->nullable();
            $table->string('tipe')->nullable();
            $table->boolean('ikatan_kerja')->default(false);
            $table->string('no_hp')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->date('tgl_pensiun')->nullable();
            $table->string('file_sk_cpns')->nullable();
            $table->string('file_sk_pns')->nullable();
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
