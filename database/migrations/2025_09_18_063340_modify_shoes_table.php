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
        Schema::table('shoes', function (Blueprint $table) {
            //
            $table->renameColumn("name","nama_sepatu");
            $table->string("nama_sepatu",150)->change();
            $table->renameColumn("harga","harga_sepatu");
            $table->enum("jenis_sepatu", ['sneakers', 'formal', 'casual']);
            $table->tinyInteger("ukuran_sepatu")->unsigned();
            $table->string("gambar_sepatu")->after("id");

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shoes', function (Blueprint $table) {
            //
              $table->string("nama_sepatu",150)->change();
              $table->renameColumn("nama_sepatu","name");
              $table->renameColumn("harga_sepatu","harga");
              $table->dropColumn("jenis_sepatu");
              $table->dropColumn("ukuran_sepatu");
              $table->dropColumn("gambar_sepatu");
              $table->dropSoftDeletes();
        });
    }
};
