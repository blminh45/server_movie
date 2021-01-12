<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raps', function (Blueprint $table) {
            $table->increments('id');
            $table->char('ten_rap',1);
            $table->tinyInteger('so_luong_ghe');
            $table->integer('id_chi_nhanh')->unsigned();
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();

            $table->foreign('id_chi_nhanh')->references('id')->on('chi_nhanhs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raps');
    }
}
