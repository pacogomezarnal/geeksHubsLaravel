<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });


        Schema::create('cursos_profesor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cursos_id');
            $table->unsignedBigInteger('profesor_id');
            $table->timestamps();

            $table->foreign('cursos_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesores');
    }
}
