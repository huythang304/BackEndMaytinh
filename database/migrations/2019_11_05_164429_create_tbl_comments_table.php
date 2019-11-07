<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('userId');
            $table->text('content');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('tbl_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_comments');
    }
}
