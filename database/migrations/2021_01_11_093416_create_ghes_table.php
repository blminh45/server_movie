<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghes', function (Blueprint $table) {
            $table->increments('id');
            $table->char('hang', 1);
            $table->tinyInteger('cot');
            $table->unsignedDecimal('gia_ghe', 10, 0);
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
        Schema::dropIfExists('ghes');
    }
}