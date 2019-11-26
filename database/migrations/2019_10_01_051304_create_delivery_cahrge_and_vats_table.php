<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryCahrgeAndVatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_cahrge_and_vats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('inside_dhaka',8,2)->nullable();
            $table->float('outside_dhaka',8,2)->nullable(); 
            $table->float('free_ship_above_or_equal')->default(0)->comment('free_shipping_above_or_equal');
            $table->tinyInteger('product_vat')->nullable();
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
        Schema::dropIfExists('delivery_cahrge_and_vats');
    }
}
