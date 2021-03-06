<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiFungsionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_fungsional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('fungsional_id');
            $table->date('tmt');
            $table->string('file_sk');
            $table->string('status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');   
            $table->foreign('fungsional_id')->references('id')->on('fungsional')->onDelete('cascade')->onUpdate('cascade');  
            
            $table->foreign('created_by')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('updated_by')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai_fungsional');
    }
}
