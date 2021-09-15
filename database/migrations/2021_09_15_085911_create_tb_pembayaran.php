<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->string('nama_pembayaran', 200);
            $table->double('nominal');
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
        Schema::table('tb_tagihan', function (Blueprint $table){
            $table->dropForeign('tb_tagihan_id_pembayaran_foreign');
        });
        Schema::dropIfExists('tb_pembayaran');
    }
}
