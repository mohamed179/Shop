<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('sku');
            $table->index('sku');
            $table->decimal('price', 20, 2);
            $table->index('price');
            $table->decimal('tax', 20, 2)->nullable();
            $table->decimal('shipping', 20, 2)->nullable();
            $table->string('summary')->nullable();
            $table->string('author')->nullable();
            $table->string('edition')->nullable();
            $table->string('isbn')->nullable();
            $table->dateTime('publish_date')->nullable();
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
        Schema::dropIfExists('books');
    }
}
