<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 25);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('book_id');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
            
            $table->unique('order_number');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};