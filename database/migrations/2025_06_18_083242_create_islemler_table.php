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
    Schema::create('islemler', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('musteri_id'); // ilişki için
        $table->string('yapilan_islem'); // örnek: yağ değişimi, filtre değişimi
        $table->decimal('fiyat', 8, 2);  // örnek: 150.00
        $table->timestamps();

        // Foreign key: islemler.musteri_id -> musteriler.id
        $table->foreign('musteri_id')->references('id')->on('musteriler')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islemler');
    }
};
