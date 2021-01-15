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
            $table->integer('id_lich_chieu')->unsigned();
            $table->integer('id_khach_hang')->unsigned();
            $table->integer('id_ghe')->unsigned();
            $table->unsignedDecimal('gia_ve', 10, 0);
            $date = getdate();
            $table->date('ngay_mua')->default($date['year'] . '-' . $date['mon'] . '-' . $date['mday']);
            $table->boolean('trang_thai')->default(true);
            $table->timestamps();

            //foreign key
            $table->foreign('id_lich_chieu')->references('id')->on('lich_chieus');
            $table->foreign('id_khach_hang')->references('id')->on('khach_hangs');
            $table->foreign('id_ghe')->references('id')->on('ghes');
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