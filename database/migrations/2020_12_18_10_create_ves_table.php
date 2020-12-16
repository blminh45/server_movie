<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_suat_chieu')->unsigned();
            $table->integer('id_khach_hang')->unsigned();
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();

            //foreign key
            $table->foreign('id_suat_chieu')->references('id')->on('suat_chieus');
            $table->foreign('id_khach_hang')->references('id')->on('khach_hangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ves');
    }
}
