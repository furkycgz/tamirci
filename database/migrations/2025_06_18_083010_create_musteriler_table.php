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
    Schema::create('musteriler', function (Blueprint $table) {
        $table->id();
        $table->string('ad_soyad');
        $table->string('telefon');
        $table->string('plaka');
        $table->string('model');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musteriler');
    }
};
