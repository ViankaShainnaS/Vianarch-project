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
            $table->string(column: 'name', length: 100)->nullabe(value: false);
            $table->text(column: 'description')->nullabe(value: false);
            $table->integer(column: 'price')->nullabe(value: false);
            $table->integer(column: 'rating')->default(value: 0);
            $table->enum(column: 'jenis', allowed: ['elektronik', 'pakaian', 'aksesoris']);
            $table->timestamps();
            $table->softDeletes();
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
