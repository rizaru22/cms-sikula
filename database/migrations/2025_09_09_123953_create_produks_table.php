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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->decimal('price',12,2)->nullable();
            $table->text('description')->nullable();
            $table->string('contact_person');
            $table->string('category')->nullable();  // Kategori produk (makanan, jasa, kerajinan, dll)
            $table->integer('stock')->nullable();    // Stok barang (jika fisik)
            $table->string('unit')->nullable();      // Satuan (pcs, box, kg, paket)
            $table->json('gallery')->nullable();     // Foto tambahan (lebih dari 1 gambar)
            $table->boolean('is_active')->default(true); // Status aktif/tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
