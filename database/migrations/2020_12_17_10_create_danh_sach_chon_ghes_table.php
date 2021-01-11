<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhSachChonGhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_sach_chon_ghes', function (Blueprint $table) {
            $table->integer('id_ghe');
            $table->integer('id_rap');
            $table->integer('id_lich_chieu')->unsigned();
            $table->tinyInteger('trang_thai')->default(1);
            $table->timestamps();
            
            //foreign key
            $table->foreign('id_lich_chieu')->references('id')->on('lich_chieus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_sach_chon_ghes');
    }
}
