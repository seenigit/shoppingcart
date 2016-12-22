<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('quantity');
            $table->string('total_price');
            $table->timestamps();
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
