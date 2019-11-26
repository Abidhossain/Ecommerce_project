<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('executive_name')->nullable();
            $table->string('privilege_card_no')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('doctors_name')->nullable();
            $table->string('problem_type')->nullable();
            $table->string('attache_pharmacy')->nullable();
            $table->string('medicine_type')->nullable();
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
        Schema::dropIfExists('memberforms');
    }
}
