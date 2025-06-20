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
    Schema::create('arac_gecmisis', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('musteri_id');
        $table->string('model');
        $table->string('plaka');
        $table->timestamps();

        $table->foreign('musteri_id')->references('id')->on('musteriler')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arac_gecmisis');
    }
};
