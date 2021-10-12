<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girias', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('criadoPor')->unsigned();
            $table->foreign('criadoPor')->references('id')->on('users');

            $table->string('nome');
            $table->string('local');
            $table->mediumText('significados');
            $table->mediumText('etimologia')->nullable();
            $table->string('imagem')->nullable();
            $table->string('videoId')->nullable();
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
        Schema::dropIfExists('girias');
    }
}
