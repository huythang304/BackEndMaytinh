<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->char('code', 50)->unique();
            $table->unsignedInteger('categoryId');
            $table->Integer('price')->nullable();
            $table->Integer('quantity');
            $table->tinyInteger('discount')->default(0);
            $table->string('image',255);
            $table->text('promotion');
            $table->text('description');            
            $table->tinyInteger('highlight')->default(0);
            $table->longText('content');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('categoryId')->references('id')->on('tbl_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_products');
    }
}
