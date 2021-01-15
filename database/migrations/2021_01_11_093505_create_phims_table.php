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
            $table->increments('id');
            $table->string('ten_phim');
            $table->integer('id_the_loai')->unsigned();
            $table->float('thoi_luong');
            $table->unsignedDecimal('gia_phim', 10, 0);
            $date = getdate();
            $table->date('khoi_chieu')->default($date['year'] . '-' . $date['mon'] . '-' . $date['mday']);
            $table->string('hinh_anh')->nullable();
            $table->float('diem')->nullable()->default(8);
            $table->integer('tuoi')->nullable()->default(18);
            $table->string('tom_tat')->nullable()->default('tom tat');
            $table->string('trailer')->nullable()->default('trong');
            $table->tinyInteger('trang_thai')->default(1);
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
        Schema::dropIfExists('phims');
    }
}