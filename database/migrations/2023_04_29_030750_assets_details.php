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
        Schema::create('asset_clasifications', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->timestamps();
        });
        Schema::create('asset_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_clasification_id')->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->timestamps();
        });
        Schema::create('asset_sub_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_clasification_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_type_id')->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->timestamps();
        });
        Schema::create('asset_locations', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_clasifications');
        Schema::dropIfExists('asset_types');
        Schema::dropIfExists('asset_sub_types');
        Schema::dropIfExists('asset_locations');
    }
};
