<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::dropIfExists('sub_sub_masutas');
        Schema::dropIfExists('sub_masutas');
        Schema::dropIfExists('masutas');

        Schema::create('masutas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('desc')->nullable();
            $table->timestamps();
        });

        Schema::create('sub_masutas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masuta_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('code');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('sub_sub_masutas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masuta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_masuta_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('code');
            $table->string('name');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_sub_masutas');
        Schema::dropIfExists('sub_masutas');
        Schema::dropIfExists('masutas');
    }
};
