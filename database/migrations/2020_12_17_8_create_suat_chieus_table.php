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
            $date=getdate();
            $table->date('ngay_chieu')->default($date['year'].'-'.$date['mon'].'-'.$date['mday']);
            $table->time('gio_chieu')->nullable();
            $table->boolean('trang_thai')->default(1);
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
        Schema::dropIfExists('suat_chieus');
    }
}
