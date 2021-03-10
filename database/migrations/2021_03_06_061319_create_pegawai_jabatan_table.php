<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_jabatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('file_sk')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreign('jabatan_id')->references('id')->on('jabatan_unit')->onDelete('cascade')->onUpdate('cascade');  
            
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
        Schema::dropIfExists('pegawai_jabatan');
    }
}
