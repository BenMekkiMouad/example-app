<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_book', function (Blueprint $table) {
            $table->id();

            $table->integer('book_id')->insigned()->nullable();
            $table->foreign('book_id')->references('id')
                  ->on('books')->onDelete('cascade');
           
            $table->integer('category_id')->insigned()->nullable();
            $table->foreign('category')->references('id')
                  ->on('categories')->onDelete('cascade');
            


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
        Schema::dropIfExists('category_book');
    }
}
