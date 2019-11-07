<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 190);
            $table->string('slug', 190);
            $table->unsignedInteger('adminId')->nullable();
            $table->longText('description');
            $table->longText('content');
            $table->string('image', 255)->nullable();
            $table->timestamps();
             $table->foreign('adminId')->references('id')->on('tbl_admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_news');
    }
}
