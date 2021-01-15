<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichChieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_chieus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rap')->unsigned();
            $table->integer('id_phim')->unsigned();
            $table->integer('id_suat_chieu')->unsigned();
            $table->unsignedDecimal('gia_lich_chieu', 6, 2)->default(80);
            $table->boolean('trang_thai')->default(true);
            $table->timestamps();
            $table->unique(['id_rap', 'id_suat_chieu']);
            //foreign key
            $table->foreign('id_rap')->references('id')->on('raps');
            $table->foreign('id_phim')->references('id')->on('phims');
            $table->foreign('id_suat_chieu')->references('id')->on('suat_chieus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_chieus');
    }
}