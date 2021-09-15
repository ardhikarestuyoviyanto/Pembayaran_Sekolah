<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTagihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tagihan', function (Blueprint $table) {
            $table->bigIncrements('id_tagihan');
            $table->integer('id_siswa');
            $table->integer('id_pembayaran');
            $table->string('payment_type', 200)->nullable(true);;
            $table->date('tgl_bayar')->nullable(true);;
            $table->enum('status', ['belum lunas', 'lunas']);
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
        Schema::dropIfExists('tb_tagihan');
    }
}
