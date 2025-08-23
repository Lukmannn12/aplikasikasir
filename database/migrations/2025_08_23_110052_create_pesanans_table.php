<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); // nama customer
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // relasi ke produk
            $table->integer('quantity')->default(1); // jumlah produk yang dipesan
            $table->decimal('price', 15, 2); // harga produk saat dipesan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
