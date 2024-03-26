<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('archives');
        Schema::dropIfExists('inventory_assets');
        Schema::dropIfExists('monetaries');
    }
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::dropIfExists('employees');
            Schema::dropIfExists('archives');
            Schema::dropIfExists('inventory_assets');
            Schema::dropIfExists('monetaries');

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masuta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_masuta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_sub_masuta_id')->constrained()->cascadeOnDelete();
            // $table->string('dnumb')->autoIncrement();
            // $table->integer('month');
            // $table->integer('year');
            $table->string('full_code')->virtualAs('concat(sub_masuta_id, \'\',sub_sub_masuta_id)');
            $table->string('nama');
            $table->string('file');
            $table->timestamps();
        });
        Schema::create('inventory_assets', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('code');
            $table->string('nama');
            $table->string('type');
            $table->string('description');
            $table->integer('qty');
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('monetaries', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nama');
            $table->integer('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

};
