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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama produk
            $table->text('description')->nullable(); // deskripsi produk
            $table->decimal('price', 12, 2)->default(0); // harga produk
            $table->string('image')->nullable(); // gambar produk
            $table->unsignedInteger('stock')->default(0); // stok produk
            $table->unsignedBigInteger('product_category_id'); // id kategori (relasi)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
