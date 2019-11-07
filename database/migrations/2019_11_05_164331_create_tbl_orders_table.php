<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('code',20)->unique();
            $table->unsignedBigInteger('userId');
            $table->unsignedInteger('adminId')->nullable();
            $table->text('note');
            $table->string('name',100);
            $table->string('address',250);
            $table->char('phone',50);
            $table->unsignedInteger('transportId');
            $table->unsignedInteger('payId');
            $table->tinyInteger('status')->default(0);
            $table->double('amount', 15, 2);
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->foreign('adminId')->references('id')->on('tbl_admins')->onDelete('cascade');
            $table->foreign('transportId')->references('id')->on('tbl_transports')->onDelete('cascade');
            $table->foreign('payId')->references('id')->on('tbl_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_orders');
    }
}
