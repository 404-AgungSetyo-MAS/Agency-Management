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
        // Schema::dropIfExists('anggarans');
        // Schema::dropIfExists('keukategoris');
        // Schema::dropIfExists('keusubkategoris');

        Schema::create("anggarans", function (Blueprint $table) {
            $table->id();
            $table->float('nominal');
            $table->timestamps();
        });
        Schema::create("keukategoris", function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->default('');
            $table->timestamps();
        });
        Schema::create("keusubkategoris", function (Blueprint $table) {
            $table->id();
            $table->foreignId('keukategori_id')->constrained()->cascadeOnDelete();
            $table->string('name')->unique()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggarans');
        Schema::dropIfExists('keukategoris');
        Schema::dropIfExists('keusubkategoris');
    }
};
