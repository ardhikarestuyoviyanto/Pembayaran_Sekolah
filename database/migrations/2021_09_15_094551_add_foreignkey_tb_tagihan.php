<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyTbTagihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_tagihan', function (Blueprint $table){
            $table->foreign('id_siswa')->references('id_siswa')->on('tb_siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('tb_pembayaran')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
