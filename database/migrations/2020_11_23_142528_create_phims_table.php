<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phims', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->string('ten_phim');
            $table->string('hinh_anh')->nullable();
            $table->integer('id_the_loai');
            $table->foreign('id_the_loai')->references ('id')->on('the_loais');
            $table->float('thoi_luong');
            $table->date('khoi_chieu')->nullable();
            $table->string('tom_tat')->nullable();
            $table->string('trailer')->nullable();
            $table->boolean('trang_thai')->default('1');
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phims');
    }
}
