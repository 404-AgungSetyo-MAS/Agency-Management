<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

        /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
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
            $table->json('img')->nullable()->default('employee-def.jpg');
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
            // $table->string('masuta_name')->virtualAs('CONCAT(masutas.name)');
            $table->foreignId('sub_masuta_id')->constrained()->cascadeOnDelete();
            // $table->string('sub_masuta_code');
            $table->foreignId('sub_sub_masuta_id')->constrained()->cascadeOnDelete();
            // $table->string('sub_sub_masuta_code');
            $table->string('full_code')->virtualAs('concat(LPAD(sub_masuta_id, 2, \'0\'), \' \',LPAD(sub_sub_masuta_id, 2,\'0\'),\' \', LPAD(id, 4,\'0\'), DATE_FORMAT(updated_at, \'%m%y\'))');
            $table->date('tgl');
            $table->string('nama');
            $table->string('file');
            $table->timestamps();
        });
        Schema::create('inventory_assets', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('code')
                ->virtualAs('concat(LPAD(asset_clasification_id, 2, \'0\'),\' \',
                             LPAD(asset_type_id, 2, \'0\'),\' \',
                             LPAD(asset_sub_type_id, 2, \'0\'),\' \',
                             LPAD(asset_location_id, 3, \'0\'),\' \',
                             LPAD(id, 4, \'0\'), date_format(tgl, \'%y\'))');
            $table->foreignId('asset_clasification_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_sub_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_location_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('tgl');
            $table->string('nama');
            // $table->integer('qty');
            $table->string('description');
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
};
