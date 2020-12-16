<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuatChieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suat_chieus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rap')->unsigned();
            $table->integer('id_phim')->unsigned();
            $table->date('ngay_chieu');
            $table->time('gio_chieu')->nullable();
            $table->tinyInteger('trang_thai')->default(1);
            $table->timestamps();

            //foreign key
            $table->foreign('id_rap')->references('id')->on('raps');
            $table->foreign('id_phim')->references('id')->on('phims');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suat_chieus');
    }
}
