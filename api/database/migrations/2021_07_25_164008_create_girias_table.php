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
            $table->string('nome');
            $table->string('local');
            $table->mediumText('significados');
            $table->mediumText('etimologia');
            $table->string('imagem');
            $table->string('videoId');
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
