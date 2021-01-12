<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhSachGhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_sach_ghes', function (Blueprint $table) {
            $table->integer('id_ghe')->unsigned();
            $table->integer('id_rap')->unsigned();
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();

            //primary key
            $table->primary(['id_ghe', 'id_rap']);

            //foreign key
            $table->foreign('id_ghe')->references('id')->on('ghes');
            $table->foreign('id_rap')->references('id')->on('raps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_sach_ghes');
    }
}
