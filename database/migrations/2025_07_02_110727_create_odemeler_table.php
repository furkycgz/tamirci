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
        Schema::create('odemeler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('musteri_id');
            $table->decimal('tutar', 10, 2);
            $table->timestamps();
                 $table->string('aciklama')->nullable();

            $table->foreign('musteri_id')
                  ->references('id')
                  ->on('musteriler')
                  ->onDelete('cascade');
        }); // ← sadece bu yeterli
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('odemeler', function (Blueprint $table) {
        $table->dropColumn('aciklama');
    });
    }
};
