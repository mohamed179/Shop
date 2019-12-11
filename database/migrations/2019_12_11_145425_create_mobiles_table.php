<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('model');
            $table->string('brand');
            $table->string('sku');
            $table->index('sku');
            $table->decimal('price', 20, 2);
            $table->index('price');
            $table->decimal('tax', 20, 2)->nullable();
            $table->decimal('shipping', 20, 2)->nullable();
            $table->string('summary')->nullable();
            $table->string('processor');
            $table->integer('memory_capacity');
            $table->string('os');
            $table->string('os_version');
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
        Schema::dropIfExists('mobiles');
    }
}
