<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_name', 50);
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('image', 255)->nullable();
            $table->tinyInteger('location')->default(0);
            $table->tinyInteger('highlight')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('parent_id')->references('category_id')->on('tbl_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_categories');
    }
}
