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
            $table->string('code');
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
            $table->string('code')->virtualAs('concat(LPAD(keukategori_id, 2, \'0\'), \'.\', LPAD(keusubkategori_id, 2, \'0\'),\'.\',date_format(tgl, \'%m%y\'), nomor)');
            $table->foreignId('keukategori_id')->constrained()->cascadeOnDelete();
            $table->foreignId('keusubkategori_id')->constrained()->cascadeOnDelete();
            $table->integer('nomor');
            $table->string('nama');
            $table->date('tgl');
            $table->integer('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('archives');
        Schema::dropIfExists('inventory_assets');
        Schema::dropIfExists('monetaries');
    }
};
