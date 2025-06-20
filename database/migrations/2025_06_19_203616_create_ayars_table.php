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
    Schema::create('ayars', function (Blueprint $table) {
        $table->id();
        $table->string('sirket_adi')->nullable();
        $table->string('logo')->nullable(); // logo dosya adı
        $table->text('adres')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayars');
    }
};
