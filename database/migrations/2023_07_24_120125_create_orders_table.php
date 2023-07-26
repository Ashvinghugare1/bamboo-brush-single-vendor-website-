<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullabel();
            $table->string('email')->nullabel();
            $table->string('phone')->nullabel();
            $table->string('address')->nullabel();
            $table->string('user_id')->nullabel();

            $table->string('product_title')->nullabel();
            $table->string('quantity')->nullabel();
            $table->string('price')->nullabel();
            $table->string('image')->nullabel();
            $table->string('product_id')->nullabel();

            $table->string('payment_status')->nullabel();
            $table->string('delivery_status')->nullabel();
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
};
