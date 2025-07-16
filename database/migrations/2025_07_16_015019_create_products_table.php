<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->decimal('total', 10, 2);
        $table->timestamps();
        Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->decimal('price', 8, 2);
    $table->string('image')->nullable();
    $table->timestamps();
});

    });
}

};
