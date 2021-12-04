<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Idiom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('idiom', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('criadoPor')->unsigned();
            $table->foreign('criadoPor')->references('id')->on('users');

            $table->string('expressao_pt');
            $table->string('expressao_en');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
