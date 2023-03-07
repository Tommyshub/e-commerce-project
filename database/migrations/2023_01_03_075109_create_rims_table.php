<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRimsTable extends Migration
{
    public function up()
    {
        Schema::create('rims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diameter');
            $table->unsignedBigInteger('width');
            $table->string('bolt_pattern');
            $table->unsignedBigInteger('offset');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rims');
    }
}
