<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('shipping_id')->nullable();
            $table->string('order_date')->nullable(); 
            $table->string('order_by')->nullable();
            $table->string('receive_by')->nullable();
            $table->string('delivered_by')->nullable();
            $table->float('sub_total',8,2)->nullable();
            $table->float('discount',8,2)->nullable(); 
            $table->float('delivery_charge',8,2)->nullable(); 
            $table->float('total_vat')->default(0); 
            $table->tinyInteger('order_status')->comment('0=order_pending,1=order_receive,2=order_on_ship,3=order_cancel,4=order_deliver')->default(0);
            $table->tinyInteger('payment_status')->nullable();
            $table->tinyInteger('payment_info')->nullable();
            $table->string('order_notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
