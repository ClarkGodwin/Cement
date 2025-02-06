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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users'); 
            $table->foreignId('id_cement')->references('id')->on('cement'); 
            $table->unsignedTinyInteger('weight')->nullable(false); 
            $table->unsignedSmallInteger('quantity')->default(1); 
            $table->unsignedMediumInteger('unity_price')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
