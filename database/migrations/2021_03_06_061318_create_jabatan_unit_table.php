<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan_unit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->string('nama');
            $table->string('grade');
            $table->string('corporate_grade');
            $table->unsignedBigInteger('parent_jabatan_unit_id')->nullable();

            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parent_jabatan_unit_id')->references('id')->on('unit')->onDelete('cascade')->onUpdate('cascade ');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatan_unit');
    }
}
