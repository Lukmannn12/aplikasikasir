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
        Schema::create('pesanan_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade'); // relasi ke pesanan
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // relasi ke produk
            $table->integer('quantity')->default(1); // jumlah produk
            $table->decimal('price', 12, 2); // harga satuan produk saat dipesan
            $table->decimal('subtotal', 15, 2); // price * quantity
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_items');
    }
};
