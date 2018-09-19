<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoSetoresTableResponsaveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('responsaveis', function (Blueprint $table) {
        //     $table->integer('setor_id')->unsigned();
        //     $table->foreign('setor_id')->references('id')->on('setores')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('responsaveis', function (Blueprint $table) {
        //     $table->dropForeign('setor_id');
        //     $table->dropColumn('setor_id');
        // });
    }
}
